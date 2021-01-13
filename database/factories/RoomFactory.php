<?php

namespace Database\Factories;

use App\Models\Image;
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


    public function configure()
    {
        return $this->afterMaking(function (Room $model) {

        })->afterCreating(function (Room $model) {

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'=> $this->faker->firstNameFemale,
            'numroom'=>$this->faker->unique()->numberBetween(1,200),
            'price'=>$this->faker->numberBetween(50,200),
            'capacity'=>$this->faker->numberBetween(1,5),
            'availability'=>true,
            'description'=>$this->faker->realText(200),
            'hotel_id'=>1
        ];
    }
}
