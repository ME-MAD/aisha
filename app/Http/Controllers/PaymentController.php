<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;
use App\Http\Requests\Payment\getPaymentsOfGroupByMonth;
use App\Models\Payment;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Requests\Payment\UpdatePaymentRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
        return $paymentDataTable->render('pages.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentMonth = date('F');

        $gorups = Group::with([
            'students',
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
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


    public function getMonthCount(Request $request)
    {
        $paymentsCount = Payment::where('group_id', $request->group_id)
            ->where('month',  $request->month)
            ->where('paid', true)
            ->count();

        return response()->json([
            'paymentsCount' => $paymentsCount
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function getPaymentPerMonthThisYear(Request $request)
    {


        $thisYear = (isset($request->year)) ? $request->year : date('Y');

        $paymentsChart = Payment::select(
            DB::raw("(SUM(amount)) as month_amount"),
            'month'
        )
            ->where('paid', 1)
            ->whereYear('created_at', $thisYear)
            ->groupBy('month')
            ->get();

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
            'months'    => array_keys($data),
            'values'    => array_values($data),
            'years'     => $years,
            'thisYear'  => $thisYear,
        ]);
    }
}