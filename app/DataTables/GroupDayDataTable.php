<?php

namespace App\DataTables;

use App\Models\GroupDay;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class GroupDayDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('delete', 'pages.groupDays.datatable.delete')
            ->editColumn('from_time', function ($q) {
                return date("h:i a", strtotime($q->from_time)) ?? "";
            })
            ->editColumn('to_time', function ($q) {
                return date("h:i a", strtotime($q->to_time)) ?? "";
            })
            ->editColumn('day', function ($query) {
                return view('pages.groupDays.datatable.day', compact('query'));
            })
            ->rawColumns(['delete', 'day'])
            ->setRowId('id');
    }


    public function query(GroupDay $model): QueryBuilder
    {
        return $model->select([
            'group_days.id',
            'group_id',
            'day',
            'from_time',
            'to_time'
        ])->with([
            'group' => function ($q) {
                return $q->select([
                    'groups.id',
                    'groups.name',
                ]);
            },
        ]);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom' => 'Blrtip',
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-primary mr-5px', 'text' => 'Print'],
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
        return [
            [
                'name' => 'group_days.id',
                'data' => 'id',
                'title' => __('group.id'),
                "className" => 'search--col exact'
                ],

            [
                'name' => 'group.name',
                'data' => 'group.name',
                'title' => __('group.name'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'from_time',
                'data' => 'from_time',
                'title' => __('group.from_time'),
                "className" => 'search--col'
            ],

            [
                'name' => 'to_time',
                'data' => 'to_time',
                'title' => __('group.to_time'),
                "className" => 'search--col'
            ],

            [
                'name' => 'day',
                'data' => 'day',
                'title' => __('group.day'),
                "className" => 'search--col'
            ],


            [
                'name' => 'delete',
                'data' => 'delete',
                'title' => __('global.Delete'),
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
            ],
        ];
    }


    protected function filename(): string
    {
        return 'GroupDay_' . date('YmdHis');
    }
}
