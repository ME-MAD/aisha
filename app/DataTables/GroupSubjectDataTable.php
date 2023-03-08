<?php

namespace App\DataTables;

use App\Models\GroupSubject;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class GroupSubjectDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->addColumn('delete', 'pages.groupSubject.datatable.delete')
            ->editColumn('subject.name', function ($q) {
                return $q->subject->name ?? "";
            })
            ->editColumn('group.name', function ($q) {
                return $q->group->name ?? "";
            })
            ->rawColumns(['delete'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\GroupSubject $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): QueryBuilder
    {
        return GroupSubject::GroupSubjects()->with([
            'subject:id,name',
            'group:id,name'
        ]);
        // return $model->select([
        //     'group_subjects.id',
        //     'subject_id',
        //     'group_id'
        // ])->with([
        //     'subject:id,name',
        //     'group:id,name'
        // ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        $columns = [
            [
                'name' => 'group_subjects.id',
                'data' => 'id',
                'title' => trans('main.num'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'subject.name',
                'data' => 'subject.name',
                'title' =>  trans('group.study_materials_for_a_student'),
                "className" => 'search--col'
            ],

            [
                'name' => 'group.name',
                'data' => 'group.name',
                'title' => trans('group.group_name'),
                "className" => 'search--col'
            ],
        ];

        if(userCan('delete-groupSubject'))
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

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'GroupSubject_' . date('YmdHis');
    }
}