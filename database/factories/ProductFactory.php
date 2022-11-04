<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $name = $this->faker->country;
        return [
            'product_name'=>$name,
            'slug'=> Str::slug($name),
            'image'=>$this->faker->imageUrl,
            'price'=>$this->faker->randomFloat(2,1,1000),
            'description'=>$this->faker->realText,
            'stock'=>$this->faker->numberBetween(0,20)
        ];
    }
}
