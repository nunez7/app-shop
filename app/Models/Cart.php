<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //La relación con details
    public function details()
    {
        return $this->hasMany(CartDetail::class);
    }

    public function getSumaDetailAttribute()
    {
        $suma = 0.0;
        $details = $this->join("cart_details", "cart_details.cart_id", "=", "carts.id")
            ->where('carts.status', '=', 'Active')
            ->select("cart_details.*")
            ->get();
        foreach($details as $d){
            $suma += $d->quantity*$d->price;
        }
        return $suma;
    }
}
