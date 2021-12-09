<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    //La relación con details
    public function details(){
        return $this->hasMany(CartDetail::class);
    }
}
