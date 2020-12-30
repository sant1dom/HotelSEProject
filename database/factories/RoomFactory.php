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
            'type'=> 'Stanza',
            'numroom'=> 5,
            'price'=> 10,
            'capacity'=> 5,
            'availability'=>true,
            'description'=>$this->faker->realText(200),
            'hotel_id'=>1
        ];
    }
}
