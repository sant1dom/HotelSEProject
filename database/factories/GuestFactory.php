<?php


namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name,
            'surname'=>$this->faker->lastName,
            'birthdate'=>$this->faker->date(),
            'doctype'=>'IdCard',
            'numdoc'=>Str::random(5)
        ];
    }
}
