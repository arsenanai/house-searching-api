<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->word,
            'price'     => $this->faker->numberBetween(50000, 500000),
            'bedrooms'  => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'storeys'   => $this->faker->numberBetween(1, 3),
            'garages'   => $this->faker->numberBetween(0, 2),
        ];
    }
}