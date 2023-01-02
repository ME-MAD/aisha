<?php

namespace App\Services\Payment;

use App\Models\Payment;


class PaymentService
{
    public function updateOrCreatePayment(object $request)
    {
        if ($request->paid == "true") {
            return  Payment::updateOrCreate([
                'student_id' => $request->student_id,
                'group_id' => $request->group_id,
                'amount' => $request->amount,
                'month' => $request->month,
            ], [
                'paid' => true,
            ]);
        } else {
            return  Payment::updateOrCreate([
                'student_id' => $request->student_id,
                'group_id' => $request->group_id,
                'amount' => $request->amount,
                'month' => $request->month,
            ], [
                'paid' => false,
            ]);
        }
    }

    public function getPaymentsOfGroupByMonth($month, int $group_id)
    {
        return Payment::select(['id', 'paid', 'student_id', 'group_id', 'month'])
            ->where('month', $month)
            ->where('group_id', $group_id)
            ->get();
    }

    public function getPaymentCountOfGroupByMonth(int $group_id, $month)
    {
        return Payment::where('group_id', $group_id)
            ->where('month',  $month)
            ->where('paid', true)
            ->count();
    }
}