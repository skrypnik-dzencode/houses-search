<?php

namespace Database\Factories;

use App\Models\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'The ' . $this->faker->lastName,
            'price' => $this->faker->numberBetween(100000, 999999),
            'bedrooms' => $this->faker->numberBetween(1, 6),
            'bathrooms' => $this->faker->numberBetween(1, 5),
            'storeys' => $this->faker->numberBetween(1, 4),
            'garages' => $this->faker->numberBetween(1, 5),
        ];
    }
}
