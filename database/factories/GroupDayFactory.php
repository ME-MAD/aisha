<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupDay>
 */
class GroupDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array_day = ['Monday', 'Tuesday', 'Wednesday', 'Thursday','friday','saturday','sunday'];


        return [
            'age_type' => $array_day[rand(0,6)],
        ];
    }
}
