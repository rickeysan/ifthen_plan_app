<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;

class ExampleController extends Controller
{
    public function show($is_ifcard){
        logger('ExampleControllerのindexメソッドです');
        if($is_ifcard === 'true'){
            logger('controllerのif');
            $example = Example::where('is_ifcard',1)->inRandomOrder()->first();
            logger($example->body);
        }else{
            logger('controllerのthen');
            $example = Example::where('is_ifcard',0)->inRandomOrder()->first();
            logger($example->body);
        }
        return $example;
    }
}
