<?php

namespace Database\Factories;

use App\Models\ImageRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageRoom::class;


    public function configure()
    {
        return $this->afterMaking(function () {

        })->afterCreating(function (ImageRoom $model) {

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            //$this->faker->image('public/storage/', 400, 300, null, false),
            'path' => 'https://via.placeholder.com/400x300.png/00dd99',
        ];
    }
}
