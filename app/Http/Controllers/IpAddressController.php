<?php

namespace App\Http\Controllers;
use App\Mikrotik\Models\Interfaces;
use Illuminate\Http\Request;
use App\Mikrotik\Models\IpAddresses;

class IpAddressController extends Controller

{
    protected $module = IpAddresses::class;
    public function index()
    {
        $data = $this->module::get();
        return view('admin.layout.simple-table')
        ->with('data', $data)
        ->with('moduleName','ip-addresses');
    }

    public function create()
    {
        return view('admin.ip-address.create')->with('interfaces', Interfaces::get());
    }

    public function store(Request $request)
    {
        $this->module::add($request->only(['address','network','interface']));
        return $this->redirectWithAlert(true,'ip-addresses');
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request, $id)
    {
        $this->module::delete($id);
        return $this->redirectWithAlert(true,'ip-addresses');
    }
}
