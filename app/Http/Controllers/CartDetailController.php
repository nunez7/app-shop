<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    //
    public function store(Request $request){
        $cartDetail = new CartDetail();
        //Obteniendo el card id del usuario activo, en el modelo user se agrego el acceso
        $cartDetail->cart_id = auth()->user()->cart->id;
        $cartDetail->product_id = $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->price = $request->price;
        $cartDetail->save();
        $notification = 'El producto se ha cargado a tu carrito de compras con éxito.';
        return back()->with(compact('notification'));
    }

    public function destroy(Request $request){
        $cartDetail = CartDetail::where("id","=", $request->cart_detail_id)->first();
        if($cartDetail->cart_id == auth()->user()->cart->id){
            $cartDetail->delete();
        }
        $notification = 'El producto se ha eliminado del carrito correctamente.';
        return back()->with(compact('notification'));
    }
}
