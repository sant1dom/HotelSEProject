<?php

namespace Database\Factories;

use App\Models\ImageRoom;
use App\Models\ImageService;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageService::class;


    public function configure()
    {
        return $this->afterMaking(function () {

        })->afterCreating(function (ImageService $model) {

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
            'path' => 'https://via.placeholder.com/1000.png/00dd99',
        ];
    }
}
