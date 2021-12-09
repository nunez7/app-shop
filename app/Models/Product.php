<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\VarDumper\VarDumper;

class Product extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required',
    ];

    //protected $fillable = ['id','name','description', 'long_description', 'price', 'category_id'];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Product -> images
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    //Attributo que se puestra en la vista welcome en el campo imagen, es para cuando no hay imagen destacada o no tiene imagenes
    //Agregar una por default
    public function getFeaturedImageUrlAttribute(){
        //Buscamos la imagen destacada
        $featuredImage = $this->images()->where('featured', true)->first();
        //Si no hay imagen destacada asognamos la primera
        if(!$featuredImage){
            $featuredImage = $this->images()->first();
        }
        //si encontramos la imagen retornamos la url
        //print_r($featuredImage);
        if($featuredImage){
            return $featuredImage->url;
        }

        //Devolver imagen por default si no hay alguna
        return url('/images/products/default.png');
    }
}
