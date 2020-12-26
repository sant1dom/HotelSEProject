<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'=> $this->faker->Str::random(10),
            'numroom'=> $this->faker->unique()->numberBetween($min=1,$max=100),
            'price'=> $this->faker->numberBetween($min=50,$max=150),
            'capacity'=> $this->faker->numberBetween($min=1,$max=6),
            'availability'=>true
        ];
    }
}
