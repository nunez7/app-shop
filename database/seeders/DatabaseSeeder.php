<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();
         //$this->call(UsersTableSeeder::class);
         //Product::factory(100)->create();
         //Product::factory(100)->create();
         //ProductImage::factory(200)->create();

         //Forma avenzada, creamos 5 categorias, desues agregamos 20
         //productos por categoria y 5 imagenes por producto
         $categories = Category::factory(5)->create();
         $categories -> each(function ($category){
            $products = Product::factory(20)->make();
            $category->products()->saveMany($products);
            $products->each(function ($p){
                $images = ProductImage::factory(5)->make();
                $p->images()->saveMany($images);
            });
         });
    }
}
