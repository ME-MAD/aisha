<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array_month = ['January', 'February', 'March', 'April','May','June','July','August','September','October','November','December'];


        return [
            'month' => $array_month[rand(0,29)],
        ];

        
    }
}
