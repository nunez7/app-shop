<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function welcome(){
        /*$a = 5;
        $b = 10;
        $c = $a+$b;
        //return "El valor de la suma es: $c";*/
        $products = Product::paginate(10);
        return view('welcome', compact('products'));
    }
}
