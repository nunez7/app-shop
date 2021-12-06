<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker =  Faker::create();
        return [
            'image'=> $faker->imageUrl(250,250),
            'product_id' => $faker->numberBetween(1,100),
        ];
    }
}
