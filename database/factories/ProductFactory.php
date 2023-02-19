<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(rand(1,5), true);
        return [
            'category_id' => rand(1, 5),
            'brand_id' => rand(1, 5),
            'name' => $name,
            'content' => $this->faker->realText(rand(400, 750)),
            'slug' => Str::slug($name),
            'price' => rand(100, 2000),
        ];
    }
}
