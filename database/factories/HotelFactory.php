<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\ImageRoom;
use App\Models\ImageService;
use App\Models\Room;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hotel::class;


    public function configure()
    {
        return $this->afterMaking(function (Hotel $model) {

        })->afterCreating(function (Hotel $model) {
            Admin::factory()->create();
            $room = Room::factory()
                ->has(ImageRoom::factory()->count(3)->state(function (array $attributes, Room $room) {
                    return ['room_id' => $room->id];
                })
                )
                ->count(10)->create();

            $user = User::factory();

            $user->has(Guest::factory()->state(function (array $attributes, User $user) {
                return [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'surname' => $user->surname,
                    'birthdate' => $user->birthdate,
                    'doctype' => $user->doctype,
                    'numdoc' => $user->numdoc,
                ];
            }))->has(Guest::factory()->count(8)->state(function (array $attributes, User $user) {
                return ['user_id' => $user->id];
            }))->create();


            Service::factory()
                ->has(ImageService::factory()->count(3)->state(function (array $attributes, Service $service) {
                    return ['service_id' => $service->id];
                })
                )
                ->count(10)->create();

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
            'hotelname' => $this->faker->company,
            'address' => $this->faker->address,
            'capacity' => $this->faker->randomNumber(3),
            'stars' => $this->faker->numberBetween($min = 3, $max = 5),
        ];


    }
}
