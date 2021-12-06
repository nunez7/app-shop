<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class ProductFactory extends Factory
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
            'name'=> substr($faker->sentence(3), 0, -1),
            'description'=> $faker->sentence(10),
            'long_description'=> $faker->text,
            'price' => $faker-> randomFloat(2,5, 150),
            'category_id'=> $faker->numberBetween(1,2)
        ];
    }
}
