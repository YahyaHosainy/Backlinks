<?php

namespace Database\Factories;

use App\Models\Extra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExtraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Extra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(4),
            'description' => Str::random(25),
            'service_id' => 1,
            'price_per_item' => $this->faker->randomNumber()
        ];
    }
}
