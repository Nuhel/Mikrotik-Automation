<?php

namespace App\Http\Controllers;
use App\Mikrotik\Models\Interfaces;
use Illuminate\Http\Request;
use App\Mikrotik\Models\IpPool;

class IpPoolController extends Controller

{
    protected $module = IpPool::class;
    public function index()
    {
        $data = $this->module::get();

        return view('admin.layout.simple-table')
        ->with('data', $data)
        ->with('moduleName','ip-pools');
    }

    public function create()
    {
        return view('admin.ip-pool.create');
    }

    public function store(Request $request)
    {
        //dump($request->toArray());
        $data = [
            'name' => $request->name,
            'ranges' => $request->ranges,
            'comment' => $request->comment,
        ];
        if($request->get('next-pool')){
            $data['next-pool'] = $request->get('next-pool');
        }
        ($this->module::add($data));
        return $this->redirectWithAlert(true,'ip-pools');
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
        return $this->redirectWithAlert(true,'ip-pools');
    }
}
