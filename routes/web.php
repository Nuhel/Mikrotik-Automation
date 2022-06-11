<?php

use PEAR2\Net\RouterOS;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Mikrotik\Models\Arp;
use App\Mikrotik\MikrotikApi;
use App\Mikrotik\Models\QueueSimple;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilsController;
use App\Http\Controllers\IpPoolController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\IpAddressController;
use App\Http\Controllers\PppSecterController;
use App\Http\Controllers\PppProfileController;
use App\Http\Controllers\PppoeServerController;
use App\Http\Controllers\QueueSimpleController;


Route::get('/', function () {

    $d = collect([
        '192.168.0.5' => [
            'ip' => '192.168.0.5',
            'rx' => '0',
            'tx' => '0',
        ],
        '192.168.0.6' => [
            'ip' => '192.168.0.6',
            'rx' => '0',
            'tx' => '0',
        ]
    ]);
    echo $d->toJson();
    die();

    $data = (new MikrotikApi)->run('ip/accounting/print');
    dd($data);
    $c = Customer::where('valid_till','<',now())->get();

    dd($c);
    $c->each(function($value){

        dump($value->arp_id);
       // dump(Arp::disable($value->arp_id));
    });
    $d = (new MikrotikApi)->run('/interface/monitor-traffic',[
        'interface' => 'ether1',
        'once' => ''
    ]);
    //dd($d);
})->name('dashboard');


Route::get("/dashboard", function(){
    return view('admin.index');
});


Route::get('merge',[UtilsController::class,'merge']);
Route::get('setup-mangle',[UtilsController::class,'setupMangle']);

Route::resource('queue-simple',QueueSimpleController::class);
Route::resource('interfaces',InterfaceController::class);
Route::resource('ip-addresses',IpAddressController::class);
Route::resource('ip-pools',IpPoolController::class);
Route::resource('ppp-secrets',PppSecterController::class);
Route::resource('ppp-profiles',PppProfileController::class);
Route::resource('pppoe-servers',PppoeServerController::class);


Route::get('/change-status/{id}/{status}', function($id,$status){
    $commad = "";
    if($status == 'enable'){
        $commad = MikrotikCommands::ENABLE_ARP;
    }else if($status == 'disable'){
        $commad = MikrotikCommands::DISABLE_ARP;
    }
    (new MikrotikApi())->run($commad, array(
        "numbers"=>$id
    ));
    return back();
})->name('change-status');


