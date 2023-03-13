<?php

namespace App\DataTables;

use App\Models\Payment;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PaymentDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('delete', 'pages.payment.datatable.delete')
          
            ->addColumn('paid', function ($query) {
                return view('pages.payment.datatable.paid', compact('query'));
            })
            ->editColumn('student.name', function ($q) {
                return $q->student->name ?? "";
            })
            ->editColumn('group.name', function ($q) {
                return $q->group->name ?? "";
            })
           
            ->rawColumns(['delete', 'id'])
            ->setRowId('id');
    }

    public function query(): QueryBuilder
    {
        return Payment::Payments()->with([
            'student:id,name',
            'group:id,name'
        ]);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Blrtip',
                'lengthMenu'   => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons'      => [
                    ['extend' => 'print', 'className' => 'btn btn-primary mr-5px', trans('main.print')],
                ],
                "language" => [
                    'lengthMenu' => "<div class='lengthMenuSelect' data-lang='". LaravelLocalization::getCurrentLocale() ."'>" . trans('main.display') .
                        '<select class="form-control">' .
                            '<option value="10">10</option>' .
                            '<option value="20">20</option>' .
                            '<option value="30">30</option>' .
                            '<option value="40">40</option>' .
                            '<option value="50">50</option>' .
                            '<option value="-1">All</option>' .
                        '</select> '
                    . trans('main.records') . "</div>",
                    "info" =>  trans('main.showing') . " _START_ " . trans('main.to') . " _END_ " . trans('main.of') . " _TOTAL_ " . trans('main.records'),
                    "paginate" => [
                        "next" => trans('main.next'),
                        "previous" => trans('main.previous'),
                    ]
                ],
                'order' => [
                    0, 'desc'
                ],
                'scrollX' => true,
                'initComplete' => "function() {
                this.api().columns().every(function(){
                    var column = this;
                    var exact = $(column.header()).hasClass('exact')
                    var input = document.createElement(\"input\")
                    input.style.width = column.header().style.width
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup change clear',function(){
                        if(exact)
                        {
                            var val = $(this).val()
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        }
                        else
                        {
                            column.search($(this).val() , false, false, true).draw()
                        }
                    })

                    if($(column.header()).hasClass('not--search--col'))
                    {
                        $(column.footer()).empty()
                    }
                })
            }",
                "fnDrawCallback" => "function( oSettings ) {
                refreshAllTableLinks()
            }",

            ]);
    }

    protected function getColumns(): array
    {
        $columns = [
            [
                'name' => 'payments.id',
                'data' => 'id',
                'title' => trans('main.num'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'student.name',
                'data' => 'student.name',
                'title' => trans('main.name'),
                "className" => 'search--col'
            ],

            [
                'name' => 'group.name',
                'data' => 'group.name',
                'title' => trans('group.group_name'),
                "className" => 'search--col'
            ],

            [
                'name' => 'amount',
                'data' => 'amount',
                'title' => trans('main.amount'),
                "className" => 'search--col'
            ],

            [
                'name' => 'month',
                'data' => 'month',
                'title' => trans('main.month'),
                "className" => 'search--col'
            ],

            [
                'name' => 'paid',
                'data' => 'paid',
                'title' => trans('main.paid'),
                "className" => 'search--col'
            ],
        ];

        if(userCan('delete-payment'))
        {
            $columns [] = [
                'name' => 'delete',
                'data' => 'delete',
                'title' => trans('main.delete'),
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
            ];
        }

        return $columns;
    }

    protected function filename(): string
    {
        return 'Payment_' . date('YmdHis');
    }
}