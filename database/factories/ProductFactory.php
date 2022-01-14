<?php

namespace Database\Factories;

use App\Models\Product;
use Bezhanov\Faker\Provider\Commerce;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $this->faker->addProvider(new Commerce($this->faker));
        return [
            'name' => $this->faker->productName,
            'price' => $this->faker->randomDigit(),
            'description' => $this->faker->sentence,
            'created_at' => now(),
        ];
    }
}
