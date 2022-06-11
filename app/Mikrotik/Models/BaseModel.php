<?php
namespace App\Mikrotik\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Mikrotik\MikrotikApi;

abstract class BaseModel
{
    protected $commandBase = "";
    private $add = '/add';
    private $get = '/print';
    private $set = '/set';
    private $delete = '/remove';
    private $disable = '/disable';
    private $enable = '/enable';



    public static function add($data){
        $self = (new static);
        return (new MikrotikApi())->run($self->commandBase.$self->add,$data);
    }

    public static function update($id,$data){
        $self = (new static);
        $data['.id'] = $id;
        return (new MikrotikApi())->run($self->commandBase.$self->set,$data);
    }

    public static function get(){
        $self = (new static);
        return (new MikrotikApi())->run($self->commandBase.$self->get);
    }


    public static function select($columns){
        $self = (new static);
        $proplist = null;

        if(is_array($columns)){
            $proplist = [
                '.proplist' => Arr::join($columns,',')
            ];
        }else if(is_string($columns)){
            $proplist = [
                '.proplist' => $columns
            ];
        }
        return (new MikrotikApi())->run($self->commandBase.$self->get,$proplist);
    }

    public static function find($data){

        if(is_array($data)){
            $data = collect($data)->mapWithKeys(function($value,$key){
                return [Str::of($key)->startsWith('?')?$key:"?".$key => $value];
           })->toArray();
        }else{
            $data = ['?.id' => $data];
        }
        $self = (new static);
        return (new MikrotikApi())->run($self->commandBase.$self->get, $data);
    }

    public static function delete($id){
        $self = (new static);
        return (new MikrotikApi())->run($self->commandBase.$self->delete,[
            '.id' => $id
        ]);
    }

    public static function disable($id){

        $self = (new static);
        return (new MikrotikApi())->run($self->commandBase.$self->disable,[
            'numbers' => $id
        ]);
    }

    public static function enable($id){
        $self = (new static);
        return (new MikrotikApi())->run($self->commandBase.$self->enable,[
            'numbers' => $id
        ]);
    }
}
