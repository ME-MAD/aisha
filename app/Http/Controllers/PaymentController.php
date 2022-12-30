<?php

namespace App\Http\Controllers;


use App\DataTables\PaymentDataTable;
use App\Http\Requests\Payment\getPaymentCountOfGroupByMonth;
use App\Http\Requests\Payment\getPaymentsOfGroupByMonth;
use App\Models\Group;
use App\Models\Payment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Services\Payment\PaymentChartService;

class PaymentController extends Controller
{
    private $paymentChartService;
    
    public function __construct(PaymentChartService $paymentChartService)
    {
        $this->paymentChartService = $paymentChartService;
    }

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

        $thisYear = $request->year ?? date('Y');

        $query = $this->paymentChartService->sumOfAmountAndMonth()
            ->paid()
            ->from($request->start_time ?? null)
            ->to($request->end_time ?? null);
        
        if( !($request->start_time || $request->end_time) )
        {
            $query->year($thisYear);
        }
        
        $data = $query->getForChart();
            
        $years = $this->paymentChartService->getAllPossibleYears();

        return response()->json([
            'months'         => array_keys($data),
            'values'         => array_values($data),
            'years'          => $years,
            'thisYear'       => $thisYear,
            'totalPayments'  => array_sum(array_values($data)),
        ]);
    }
}