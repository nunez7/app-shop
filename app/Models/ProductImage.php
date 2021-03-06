<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {
        if(substr($this->image, 0, 5)==="https"){
            return $this->image;
        }

        return url('/images/products/'.$this->image);
    }
}
