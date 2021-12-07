<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required',
    ];

    protected $fillable = ['id','name','description', 'long_description', 'price', 'category_id'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Product -> images
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
