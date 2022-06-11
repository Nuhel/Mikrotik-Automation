<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use App\Mikrotik\Models\Arp;
use App\Mikrotik\Models\Mangle;
use Illuminate\Http\Request;
use App\Mikrotik\Models\QueueSimple;

class UtilsController extends Controller
{
    public function merge(){
        $users = [];
        $arps = Arp::get();

        QueueSimple::select([
            '.id','name','target'
        ])->each(function($value,$key) use(&$users,$arps){
            if(Str::of($value['target'])->explode('/')->count()<3)
            {
                $arpId = $arps->filter(function ($arp) use ($value) {
                    return Str::of($value['target'])->contains($arp['address']);
                })->first();

                if($arpId != null){
                    $arpId = $arpId['.id'];
                }

                $users[] = [
                    'name' => $value['name'],
                    'connection_type' => 'QueueSimple',
                    'connection_id' => $value['.id'],
                    'arp_id' => $arpId,
                    'valid_till' => now()->addDays(30),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        });
        Customer::insert($users);
    }

    public function setupMangle(){
        $ips = QueueSimple::select(['target','name'])->filter(function($value){
            return ! Str::of($value['target'])->contains(',');
        })->map(function($value){
            $value['target'] = Str::of($value['target'])->explode('/')->first();
            return $value;
        });


        $mangles = Mangle::get();

        $txMangles = $mangles->filter(function($value){
            return Str::of($value['comment'])->contains('tx');
        })->pluck('src-address');

        $rxMangles = $mangles->filter(function($value){
            return Str::of($value['comment'])->contains('rx');
        })->pluck('dst-address');



        $txTargets = $ips->pluck('target')->filter(function($value) use ($txMangles){
            return !$txMangles->contains($value);
        });
        $rxTargets =$ips->pluck('target')->filter(function($value) use ($rxMangles){
            return !$rxMangles->contains($value);
        });

        $txTargets->each(function($value){
            Mangle::add([
                'action' => 'passthrough',
                'chain' => 'forward',
                'comment' => 'tx',
                'out-interface'=>"ether1 WAN",
                'src-address' => $value
            ]);
        });

        $rxTargets->each(function($value){
            Mangle::add([
                'action' => 'passthrough',
                'chain' => 'forward',
                'comment' => 'rx',
                'in-interface'=>"ether1 WAN",
                'dst-address' => $value
            ]);
        });

        dump($txTargets);
        dd($rxTargets);

    }
}
