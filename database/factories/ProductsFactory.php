<?php

namespace Database\Factories;

use App\Models\Stores;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stores = Stores::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(1, 99999),
            'active' => $this->faker->boolean(),
            'store_id' => $this->faker->randomElement($stores),
        ];
    }
}
