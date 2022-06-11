<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mikrotik\Models\PppSecret;

class PppSecterController extends Controller

{
    protected $module = PppSecret::class;
    public function index()
    {
        $data = $this->module::get();

        return view('admin.layout.simple-table')
        ->with('data', $data)
        ->with('moduleName','ppp-secrets');
    }

    public function create()
    {
        return view('admin.ip-pool.create');
    }

    public function store(Request $request)
    {

        return $this->redirectWithAlert(true,'ppp-secrets');
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
        return $this->redirectWithAlert(true,'ppp-secrets');
    }
}
