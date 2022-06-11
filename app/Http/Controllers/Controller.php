<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectWithAlert(bool $success = true,$moduleName = null, $defaultMessage = null){
        $trace = debug_backtrace()[1];
        $moduleName = $moduleName??$this->resolveModuleName($trace);
        $callerFunction = ($trace['function']);
        return $this->redirect($moduleName,$callerFunction, !$success, $defaultMessage);
    }

    public function resolveModuleName($trace){
        $baseClass = class_basename($trace['class']);
        return  Str::of($baseClass)->replace('Controller','')->lower()->plural();
    }

    public function getResponseArray($moduleName,$callerFunction, bool $hasError = false, $defaultMessage = null){

        $message = "dummymodule Successfully dummyfunction";

        if($hasError){
            $message = "Failed to dummyfunction dummymodule";
        }
        $readableAction = "";

        if($callerFunction == 'store'){
            $readableAction = $hasError?"Create":"Created";
        }elseif($callerFunction == 'update'){
            $readableAction = $hasError?"Update":"Updated";
        }else if($callerFunction == 'destroy'){
            $readableAction = $hasError?"Delete":"Deleted";
        }

        return [
            'status' => $hasError?'error':'success',
            'title' => $hasError?'Oops...':'Great',
            'text' => $defaultMessage??Str::of($message)->replace('dummyfunction',$readableAction)->replace('dummymodule', Str::of($moduleName)->singular()->headline()),
        ];
    }

    public function redirect($moduleName,$callerFunction, bool $hasError = false, $defaultMessage = null){
        $return = null;

        if($hasError)
            $return = redirect()->back();
        else
            $return = redirect(route($moduleName.'.index'));
        return $return->with('alert', $this->getResponseArray($moduleName,$callerFunction, $hasError,$defaultMessage));
    }


    public function redirectWithCustomAlert(RedirectResponse $redirectTo, $defaultMessage, bool $hasError = false){
        return $redirectTo->with('alert', [
            'status' => $hasError?'error':'success',
            'title' => $hasError?'Oops...':'Great',
            'text' => $defaultMessage,
        ]);
    }


}
