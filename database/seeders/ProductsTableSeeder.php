<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Category::factory(5)->create();
        //Crea 100 productos
        Product::factory(100)->create();
        //ProductImage::factory(200)->create();
    }
}
