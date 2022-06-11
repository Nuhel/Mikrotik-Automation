<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Mikrotik\Models\Arp;
use Illuminate\Http\Request;
use App\Mikrotik\Models\IpAddresses;
use App\Mikrotik\Models\QueueSimple;
use Illuminate\Support\Collection;

class QueueSimpleController extends Controller
{
    public function index()
    {
        $queues = QueueSimple::get();
        $arps = Arp::get();
        $queues = $queues->map(function ($queue) use ($arps) {
            $filteredArps = $arps->filter(function ($arp) use ($queue) {
                return Str::of($queue['target'])->contains($arp['address']);
            });
            $queue['arp'] = $filteredArps->first();
            $queue['max-limit'] = (Str::of($queue['max-limit'])->explode('/')->first() ?? 1000000) / 1000000;
            return $queue;
        });

        return view('admin.queues.index')->with([
            'queues' => $queues,
        ]);
    }

    public function create()
    {

        $useableIpAddressesGroups = $this->getUseableIps();
        return view('admin.queues.create')->with([
            'useableIpAddressesGroups' => $useableIpAddressesGroups
        ]);
    }

    public function store(Request $request)
    {
        QueueSimple::add([
            'name' => $request->name,
            'max-limit' => $request->get('max-limit') . "M/" . $request->get('max-limit') . "M",
            'target' => $request->target,
        ]);

        if ($request->get('mac-address')) {
            Arp::add([
                'address' => $request->target,
                'comment' => $request->name,
                'mac-address' => $request->get('mac-address'),
                'interface' => $request->interface,
            ]);
        }
        return $this->redirectWithAlert(true, 'queue-simple');
    }

    public function edit($queueSimpleId)
    {
        $queue = QueueSimple::find($queueSimpleId)->first();
        $ip = Str::of($queue['target'])->explode('/')->first();
        $arp = Arp::find(['address' => $ip])->first();
        $useableIpAddressesGroups = $this->getUseableIps($ip);
        return view('admin.queues.edit')->with([
            'useableIpAddressesGroups' => $useableIpAddressesGroups,
            'queue' => $queue,
            'arp' => $arp,
            'ip' => $ip,
        ]);
    }

    public function update(Request $request, $queueSimpleId)
    {

        QueueSimple::update($queueSimpleId, [
            'name' => $request->name,
            'max-limit' => $request->get('max-limit') . "M/" . $request->get('max-limit') . "M",
            'target' => $request->target,
        ]);
        Arp::update($request->arp_id, [
            'address' => $request->target,
            'comment' => $request->name,
            'mac-address' => $request->get('mac-address'),
            'interface' => $request->interface,
        ]);
        return $this->redirectWithAlert(true, 'queue-simple');
    }

    public function destroy(Request $request, $queueSimpleId)
    {
        QueueSimple::delete($queueSimpleId);
        if ($request->arp_id) {
            Arp::delete($request->arp_id);
        }
        return $this->redirectWithAlert(true, 'queue-simple');
    }

    public function getUseableIps($include = [])
    {
        $usedIp = QueueSimple::get()->pluck('target')->map(function ($value, $key) {
            return Str::of($value)->explode('/')->first();
        });
        if (is_array($include)) {
            $include = collect($include);
        } else if (!$include instanceof Collection) {
            $include = collect([$include]);
        }

        return IpAddresses::get()->groupBy('address')
            ->mapWithKeys(function ($ip, $key) use ($usedIp, $include) {
                $useableIps = [];

                $host = Str::of($key)->explode('/')->first();
                $octetTo3 = Str::of($host)->explode('.')->except(3)->implode('.');
                for ($i = 2; $i <= 254; $i++) {
                    $targetIp = $octetTo3 . "." . $i;
                    if ($usedIp->contains($targetIp) && !$include->contains($targetIp)) {
                        //echo "Skipping: ".$octetTo3.".".$i."<br>";
                    } else {
                        $useableIps[] = [
                            'ip' => $targetIp,
                            'interface' => $ip[0]['interface']
                        ];
                    }
                }
                return [$host => $useableIps];
            });
    }
}
