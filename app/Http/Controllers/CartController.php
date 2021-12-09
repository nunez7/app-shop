<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update(){
        $fechaActual = date('Y-m-d');
        $fechaArrive = date('Y-m-d', strtotime($fechaActual.'+ 1 week'));
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->order_date = $fechaActual;
        $cart->arrived_date = $fechaArrive;
        $cart->save();
        $notification = 'Tu pedido se ha registrado correctamente. Te contacreremos pronto vía mail!';
        return back()->with(compact('notification'));
    }
}
