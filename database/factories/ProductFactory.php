<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {

        return [
            'category_id'=>$this->faker->numberBetween($min = 1, $max = 10),
            'brands_id'=>$this->faker->numberBetween($min = 1, $max = 6),
            'name'=>$this->faker->name,
            'image'=>$this->faker->imageUrl($width = 640, $height = 480) ,
            'description'=>$this->faker->text,
            'price'=>$this->faker->numberBetween($min = 1, $max = 100),
            'slug'=>Str::slug($this->faker->title),
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
