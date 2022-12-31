<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\Group;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'student_id' => Student::select('id')->InRandomOrder()->first()->id,
            // 'group_id'   => Group::select('id')->InRandomOrder()->first()->id,
            // 'amount'     => fake()->numberBetween(50, 1500),
            // 'month'      => fake()->randomElement(getMonthNames()),
            // 'paid'       => rand(0, 1),

            'notby_id'   => Student::select('id')->InRandomOrder()->first()->id,
            'notby_type' => fake()->randomElement([User::class, Teacher::class, Student::class]),

            'notable_id'    => fake()->numberBetween(50, 1500),
            'notable_type'  => fake()->randomElement([User::class, Teacher::class, Student::class]),

            'note'         => fake()->text(),
            'type'         => fake()->randomElement(Note::TYPE),
        ];
    } //notable_id	notable_type	not_by_id	not_by_type	note	type
}

