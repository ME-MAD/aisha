<?php

namespace App\Http\Controllers;


use App\DataTables\PaymentDataTable;
use App\Http\Requests\Payment\getPaymentCountOfGroupByMonth;
use App\Http\Requests\Payment\getPaymentsOfGroupByMonth;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Traits\AuthTrait;
use App\Services\Group\GroupService;
use App\Services\Payment\PaymentChartService;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    use AuthTrait;

    private PaymentChartService $paymentChartService;
    private PaymentService $PaymentService;
    private GroupService $groupService;

    public function __construct(
        PaymentChartService $paymentChartService,
        PaymentService      $PaymentService,
        GroupService        $groupService
    )
    {
        $this->paymentChartService = $paymentChartService;
        $this->PaymentService = $PaymentService;
        $this->groupService = $groupService;

        $this->handlePermissions([
            'index' => 'index-payment',
            'store' => 'store-payment',
            'create' => 'create-payment',
        ]);
    }

    public function index(PaymentDataTable $paymentDataTable)
    {
        return $paymentDataTable->render('pages.payment.index');
    }

    public function create()
    {
        $currentMonth = getCurrectMonthName();

        $groups = $this->groupService->getGruopsWithPaymentsByMonth($currentMonth);
        $this->groupService->appendAllStudentsPaidToGroups($groups);

        return view('pages.payment.create', [
            'gorups' => $groups,
            'currentMonth' => $currentMonth,
        ]);
    }

    public function store(StorePaymentRequest $request)
    {
        if ($request->paid == "true") {
            $this->PaymentService->updateOrCreatePaid($request);
        } else {
            $this->PaymentService->updateOrCreateNotPaid($request);
        }

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function getPaymentsOfGroupByMonth(getPaymentsOfGroupByMonth $request)
    {
        return response()->json([
            'payments' => $this->PaymentService->getPaymentsOfGroupByMonth($request->group_id, $request->month)
        ]);
    }

    public function getPaymentCountOfGroupByMonth(getPaymentCountOfGroupByMonth $request)
    {
        return response()->json([
            'paymentsCount' => $this->PaymentService->getPaymentCountOfGroupByMonth($request->group_id, $request->month)
        ]);
    }

    public function totalPaymentsChartData(Request $request)
    {
        $data = $this->paymentChartService->sumOfAmountAndMonth()
            ->paid()
            ->getForChart();

        return response()->json([
            'months' => array_keys($data),
            'values' => array_values($data),
            'totalPayments' => array_sum(array_values($data)),
        ]);
    }
}
