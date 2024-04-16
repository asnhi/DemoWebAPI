<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();


        return [
            'name' => $faker->name,
            'description' => $faker->sentence,
            'price' => $faker->numberBetween(50000, 1000000),
            'image' => $faker->image,
            'publisher_id'=>$faker->numberBetween(1, 4),
            'like' => $faker->numberBetween(100, 500),
            'status' => 'In Stock'
        ];
    }
}
