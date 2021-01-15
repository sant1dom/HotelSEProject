<?php


namespace Database\Factories;


use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;


class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['social', 'phone', 'email'];
        $type = $types[array_rand($types)];
        return [
            'type' => $type,
            'contact_string' => $this->buildContactString($type)
        ];
    }

    public function buildContactString($type): string
    {
        switch ($type) {
            case 'social':
                return ucfirst($this->faker->word) . ': ' . $this->faker->url;
            case 'phone':
                return 'Phone' . ': ' . $this->faker->phoneNumber;
            case 'email':
                return 'Email' . ': ' . $this->faker->email;
            default:
                return 'error';
        }
    }
}

