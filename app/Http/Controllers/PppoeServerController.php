<?php

namespace App\Http\Controllers;

use App\Mikrotik\Models\PppoeServer;
use Illuminate\Http\Request;

class PppoeServerController extends Controller
{
    protected $module = PppoeServer::class;
    public function index()
    {
        $data = $this->module::get();
        return view('admin.layout.simple-table')
        ->with('data', $data)
        ->with('moduleName','pppoe-servers');
    }

    public function create()
    {
        return view('admin.ip-pool.create');
    }

    public function store(Request $request)
    {

        return $this->redirectWithAlert(true,'pppoe-servers');
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
        return $this->redirectWithAlert(true,'pppoe-servers');
    }
}
