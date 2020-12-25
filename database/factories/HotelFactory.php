<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotelname' => $this->faker->company,
            'address' => $this->faker->address,
            'capacitiy' => $this->faker->randomNumber(3),
            'stars' => $this->faker->randomNumber(1),
        ];
    }
}
