<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class ChartController extends Controller
{
    public function paymentsChart()
    {

        $paymentsChart = Payment::select(DB::raw("(SUM(amount)) as month_amount"), 'month')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get()
            ->pluck('month_amount', 'month');



        return response()->json([
            'paymentsChart' => $paymentsChart
        ]);
    }
}
