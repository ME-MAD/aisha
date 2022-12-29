<?php

namespace App\Http\Controllers;


use App\DataTables\PaymentDataTable;
use App\Http\Requests\Payment\getPaymentCountOfGroupByMonth;
use App\Http\Requests\Payment\getPaymentsOfGroupByMonth;
use Carbon\Carbon;
use App\Models\Group;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Payment\StorePaymentRequest;

class PaymentController extends Controller
{
    public function index(PaymentDataTable $paymentDataTable)
    {
        return $paymentDataTable->render('pages.payment.index');
    }

    public function create()
    {
        $currentMonth = getCurrectMonthName();

        $gorups = Group::with([
            'students.payments',
            'groupType',
            'payments' => function ($query) use ($currentMonth) {
                return $query->where('month', $currentMonth);
            }
        ])->get();

        $gorups->map(function ($group) {
            $group->allStudentsPaid = $group->students->count() == $group->payments->where('paid', true)->count();
        });

        return view('pages.payment.create', [
            'gorups' => $gorups,
            'currentMonth' => $currentMonth,
        ]);
    }

    public function store(StorePaymentRequest $request)
    {
        if ($request->paid == "true") {
            Payment::updateOrCreate([
                'student_id' => $request->student_id,
                'group_id' => $request->group_id,
                'amount' => $request->amount,
                'month' => $request->month,
            ], [
                'paid' => true,
            ]);
        } else {
            Payment::updateOrCreate([
                'student_id' => $request->student_id,
                'group_id' => $request->group_id,
                'amount' => $request->amount,
                'month' => $request->month,
            ], [
                'paid' => false,
            ]);
        }
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getPaymentsOfGroupByMonth(getPaymentsOfGroupByMonth $request)
    {
        $payments = Payment::select(['id', 'paid', 'student_id', 'group_id', 'month'])
            ->where('month', $request->month)
            ->where('group_id', $request->group_id)
            ->get();

        return response()->json([
            'payments' => $payments
        ]);
    }

    public function getPaymentCountOfGroupByMonth(getPaymentCountOfGroupByMonth $request)
    {
        $paymentsCount = Payment::where('group_id', $request->group_id)
            ->where('month',  $request->month)
            ->where('paid', true)
            ->count();

        return response()->json([
            'paymentsCount' => $paymentsCount
        ]);
    }

    public function getPaymentPerMonthThisYear(Request $request)
    {

        $thisYear = (isset($request->year)) ? $request->year : date('Y');

        $paymentsChart = Payment::select(
            DB::raw("(SUM(amount)) as month_amount"),
            'month'
        )->where('paid', 1);
 
        if (isset($request->start_time) && isset($request->end_time)) {
            $paymentsChart = $paymentsChart->whereBetween('created_at', [
                Carbon::createFromFormat('Y-m-d', $request->start_time)->startOfDay()->toDateTimeString(),
                Carbon::createFromFormat('Y-m-d', $request->end_time)->endOfDay()->toDateTimeString()
            ]);
        } else {
            $paymentsChart = $paymentsChart->whereYear('created_at', $thisYear);
        }

        $paymentsChart =  $paymentsChart->groupBy('month')->get();


        $data = [];
        foreach (getMonthNames() as $monthName) {
            $data[$monthName] = $paymentsChart->where('month', $monthName)->first()->month_amount ?? 0;
        }


        $years = Payment::select(
            DB::raw("YEAR(created_at) as year")
        )
            ->where('paid', 1)
            ->groupBy('year')
            ->get();

        return response()->json([
            'months'         => array_keys($data),
            'values'         => array_values($data),
            'years'          => $years,
            'thisYear'       => $thisYear,
            'totalPayments'  => array_sum(array_values($data)),
        ]);
    }
}