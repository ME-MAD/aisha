<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


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
            'name' => fake()->name,
            'email' => fake()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'birthday' => fake()->date(),
            'phone' => fake()->phoneNumber(),
            'avatar' => fake()->name(),
            'qualification' => fake()->text()
        ];
    }
}