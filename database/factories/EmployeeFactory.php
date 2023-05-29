<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        fake()->addProvider(new \Faker\Provider\en_ZA\Person(fake()));
        fake()->addProvider(new \Faker\Provider\en_ZA\Address(fake()));
        fake()->addProvider(new \Faker\Provider\en_ZA\PhoneNumber(fake()));
        fake()->addProvider(new \Faker\Provider\en_ZA\Company(fake()));
        fake()->addProvider(new \Faker\Provider\Lorem(fake()));
        fake()->addProvider(new \Faker\Provider\Internet(fake()));

        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'contact_number' => fake()->phoneNumber(),
            'street' => fake()->streetAddress(),
            'city' => fake()->city(),
            'country' => fake()->country(),
            'postal_code' => fake()->postcode(),
            'date_of_birth' => fake()->date('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
