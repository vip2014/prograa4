<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    //
    public function ver(){
        $var1 = 10;
        $var2 = 20;
        $suma = $var1+$var2;
        return "hola DemoController $suma";
    }
}
