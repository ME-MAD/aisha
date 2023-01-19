<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => fake()->name,
            'birthday'      => fake()->date(),
            'phone'         => fake()->phoneNumber(),
            'avatar'        => fake()->name(),
            'qualification' => fake()->text(),
            'email'         => fake()->email(),
            'password'      => Hash::make('24682468'),
        ];
    }
}

