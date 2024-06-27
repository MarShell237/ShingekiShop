<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
    * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "categories_id" => fake()->numberBetween(1,6),
            "name" => fake()->sentence(6,true),
            "description" => fake()->sentences(10,true),
            "price" => fake()->numberBetween(300,300000),
            "image"=> fake()->randomElement(['/images/faker/1.jpg','/images/faker/2.jpg','/images/faker/3.jpg','/images/faker/4.jpg','/images/faker/5.jpg','/images/faker/6.jpg','/images/faker/7.jpg','/images/faker/8.jpg','/images/faker/9.jpg','/images/faker/10.jpg','/images/faker/11.jpg','/images/faker/12.jpg','/images/faker/13.jpg','/images/faker/14.jpg','/images/faker/15.jpg','/images/faker/16.jpg']),
            "nb_vote" => fake()->numberBetween(30,1500),
            "note" => fake()->numberBetween(0,5),
        ];
    }
}
