<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Mikrotik\Models\Arp;
use Illuminate\Http\Request;
use App\Mikrotik\Models\IpAddresses;
use App\Mikrotik\Models\QueueSimple;
use Illuminate\Support\Collection;

class InterfaceController extends Controller
{
    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit($queueSimpleId)
    {
    }

    public function update(Request $request, $queueSimpleId)
    {
    }

    public function destroy(Request $request, $queueSimpleId)
    {
    }

    public function getUseableIps($include = [])
    {
    }
}
