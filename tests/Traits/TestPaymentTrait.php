<?php

namespace Tests\Traits;

use App\Models\Payment;

Trait TestPaymentTrait
{
    private function generateRandomPaymentsForGroup($group_id)
    {
        return Payment::factory(10)->create([
            'group_id' => $group_id
        ]);
    }
}