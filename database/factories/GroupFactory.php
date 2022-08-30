<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array_age_type = ['kid', 'adult'];

        return [
            'from' => fake()->time(),
            'to' => fake()->time(),
            'age_type' => $array_age_type[rand(0,2)],
            
        ];
    }
}
