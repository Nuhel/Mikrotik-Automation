<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mikrotik\Models\PppProfile;

class PppProfileController extends Controller

{
    protected $module = PppProfile::class;
    public function index()
    {
        $data = $this->module::get();

        return view('admin.layout.simple-table')
        ->with('data', $data)
        ->with('moduleName','ppp-profiles');
    }

    public function create()
    {
        return view('admin.ip-pool.create');
    }

    public function store(Request $request)
    {

        return $this->redirectWithAlert(true,'ppp-profiles');
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
        return $this->redirectWithAlert(true,'ppp-profiles');
    }
}
