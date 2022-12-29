<?php

namespace Tests\Controller;

use App\Models\Payment;
use Tests\TestCaseWithTransLationsSetUp;
use Tests\Traits\TestGroupTrait;
use Tests\Traits\TestGroupTypeTrait;
use Tests\Traits\TestPaymentTrait;
use Tests\Traits\TestStudentTrait;
use Tests\Traits\TestTeacherTrait;

class PaymentControllerTest extends TestCaseWithTransLationsSetUp
{
    use TestTeacherTrait;
    use TestGroupTrait;
    use TestStudentTrait;
    use TestPaymentTrait;
    use TestGroupTypeTrait;

    public function setUp() : void
    {
        parent::setUp();
        
        $this->refreshApplicationWithLocale('en');
    }

    public function test_index_opens_without_errors()
    {
        $res = $this->call('get', route('admin.payment.index'));

        $res->assertOk();
    }

    public function test_create_opens_successfully()
    {
        $res = $this->call('get', route('admin.payment.create'));

        $res->assertOk();
    }

    /**
     * @test
     * @dataProvider storeValidationProvider
     */
    public function test_store_validations($data)
    {
        $res = $this->call('POST', route('admin.payment.store'), $data);

        $res->assertSessionHasErrors();
    }


    

    public function test_store_pass_with_all_data()
    {
        // $this->mock(TeacherService::class, function (MockInterface $mock) {
        //     $mock->shouldReceive('createTeacher')->once();
        // });

        $data = $this->generateRandomPaymentsData();

        $res = $this->call('POST', route('admin.payment.store'), $data);

        $res->assertSessionHasNoErrors();
    }



    public function storeValidationProvider(): array
    {
        $this->refreshApplication();

        $group = $this->generateRandomGroup();
        $group->load('groupType');

        $student = $this->generateRandomStudent();

        return [
            "without data" => [
                [],
            ],
            "without a student_id" => [
                [
                    'student_id'          => null,
                    'group_id'          => $group->id,
                    'amount' => $group->groupType->price,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => "true"
                ],
            ],
            "without a group_id" => [
                [
                    'student_id'          => $student->id,
                    'group_id'          => null,
                    'amount' => $group->groupType->price,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => "true"
                ],
            ],
            "without an amount" => [
                [
                    'student_id'        => $student->id,
                    'group_id'          => $group->id,
                    'amount' => null,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => "true"
                ],
            ],
            "without a month" => [
                [
                    'student_id'        => $student->id,
                    'group_id'          => $group->id,
                    'amount' => $group->groupType->price,
                    'month' => null,
                    'paid' => "true"
                ],
            ],
            "without a paid" => [
                [
                    'student_id'        => $student->id,
                    'group_id'          => $group->id,
                    'amount' => $group->groupType->price,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => null
                ],
            ],
            "with a group not in database" => [
                [
                    'student_id'        => $student->id,
                    'group_id'          => intval($group->id + 100),
                    'amount' => $group->groupType->price,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => "true"
                ],
            ],
            "with a student not in database" => [
                [
                    'student_id'        => intval($student->id + 100),
                    'group_id'          => $group->id,
                    'amount' => $group->groupType->price,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => "true"
                ],
            ],
            "with a wrong month name" => [
                [
                    'student_id'        => $student->id,
                    'group_id'          => $group->id,
                    'amount' => $group->groupType->price,
                    'month' => "ahmed",
                    'paid' => "true"
                ],
            ],
            "with an amount that is not the same as the group type amount" => [
                [
                    'student_id'        => $student->id,
                    'group_id'          => $group->id,
                    'amount' => $group->groupType->price + 1,
                    'month' => fake()->randomElement(getMonthNames()),
                    'paid' => "true"
                ],
            ],
        ];
    }



    /**
     * @test
     * @dataProvider getPaymentsOfGroupByMonthProvider
     */
    public function test_getPaymentsOfGroupByMonth_validations($data)
    {
        $res = $this->call('GET', route('admin.payment.getPaymentsOfGroupByMonth'), $data);

        $res->assertSessionHasErrors();
    }


    /**
     * @test
     * @dataProvider getPaymentsOfGroupByMonthProvider
     */
    public function test_getPaymentCountOfGroupByMonth_validations($data)
    {
        $res = $this->call('GET', route('admin.payment.getPaymentCountOfGroupByMonth'), $data);

        $res->assertSessionHasErrors();
    }


    public function getPaymentsOfGroupByMonthProvider(): array
    {
        $this->refreshApplication();

        $group = $this->generateRandomGroup();

        return [
            "without data" => [
                [],
            ],
            "without a group_id" => [
                [
                    'group_id'          => null,
                    'month' => fake()->randomElement(getMonthNames()),
                ],
            ],
            "without a month" => [
                [
                    'group_id'          => $group->id,
                    'month' => null,
                ],
            ],
            "with a wrong month name" => [
                [
                    'group_id'          => $group->id,
                    'month' => "ahmed",
                ],
            ],
        ];
    }

    public function test_getPaymentsOfGroupByMonth_pass()
    {
        $group = $this->generateRandomGroup();
        
        $month = fake()->randomElement(getMonthNames());

        $this->generateRandomPaymentsCustomed([
            'group_id' => $group->id,
            'month' => $month
        ],5);

        $res = $this->call('GET', route('admin.payment.getPaymentsOfGroupByMonth'), [
            'group_id' => $group->id,
            'month' => $month
        ]);

        $res->assertJsonCount(5, 'payments');
    }
    
    /**
     * @group examin
     */
    public function test_getPaymentPerMonthThisYear_gets_payments_this_year()
    {
        Payment::query()->delete();
        $now = now()->toDateTimeString();
        $payments = collect();
        for($i = 1; $i <= 10; $i++)
        {
            $payment = $this->generateRandomPaymentsCustomed([
                'created_at' => fake()->dateTime()
            ]);

            $payments->add($payment);
        }

        for($i = 1; $i <= 10; $i++)
        {
            $payment = $this->generateRandomPaymentsCustomed([
                'created_at' => $now
            ]);

            $payments->add($payment);
        }

        $paymentsGroupedByMonth = $payments->where('created_at', $now)->where('paid', 1)->groupBy('month');

        $data = [];
        foreach (getMonthNames() as $monthName) {
            $data[$monthName] = $paymentsGroupedByMonth->get($monthName)?->sum('amount') ?? 0;
        }

        $res = $this->call('POST', route('admin.payment.getPaymentPerMonthThisYear'));

        $res->assertJson([
            'values' => array_values($data)
        ]);
    }
}
