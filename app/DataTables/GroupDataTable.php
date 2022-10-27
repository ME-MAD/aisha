<?php

namespace App\DataTables;

use App\Models\Group;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class GroupDataTable extends DataTable
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
            // ->addColumn('edit', 'pages.group.datatable.edit')
            ->addColumn('edit', function ($query) {
                return view('pages.group.datatable.edit', compact('query'));
            })
            ->addColumn('delete', 'pages.group.datatable.delete')
            ->editColumn('groupType.name', function ($q) {
                return $q->groupType->name ?? "";
            })
            ->editColumn('teacher.name', function ($q) {
                return $q->teacher->name ?? "";
            })
            ->editColumn('countStudent', function ($q) {
                return ($q->group_students_count);
            })
            ->editColumn('from', function ($q) {
                return  date('h:i a', strtotime($q->from));
            })
            ->editColumn('to', function ($q) {
                return  date('h:i a', strtotime($q->to));
            })
            ->rawColumns(['edit', 'delete'])

            ->editColumn('id', function ($q) {

                return "<a class='text-primary' href=" . route('admin.group.show', $q->id) . " title='Enter Page show group' >" . $q->id . "</a>";
            })
            ->rawColumns(['edit', 'delete', 'id'])

            ->setRowId('id');
    }

    public function query(Group $model): QueryBuilder
    {

        return $model->select([
            'groups.id',
            'teacher_id',
            'from',
            'to',
            'age_type',
            'group_type_id'
        ])->withCount([
            'groupStudents'
        ])->with([
            'teacher:id,name',
            'groupType:id,name'
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
                    ['extend' => 'print', 'className' => 'btn btn-primary mr-5px', 'text' => 'Print'],
                    ['extend' => 'excel', 'className' => 'btn btn-success ', 'text' => 'Export'],
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
                    initEditeGroupModal()
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
        return [
            [
                'name' => 'groups.id',
                'data' => 'id',
                'title' => '#',
                "className" => 'search--col exact'
            ],

            [
                'name' => 'from',
                'data' => 'from',
                'title' => 'from',
                "className" => 'search--col'
            ],

            [
                'name' => 'to',
                'data' => 'to',
                'title' => 'to',
                "className" => 'search--col'
            ],

            [
                'name' => 'teacher.name',
                'data' => 'teacher.name',
                'title' => ' teacher_id',
                "className" => 'search--col'
            ],

            [
                'name' => 'groupType.name',
                'data' => 'groupType.name',
                'title' => 'group_type_id',
                "className" => 'search--col'
            ],

            [
                'name' => 'age_type',
                'data' => 'age_type',
                'title' => 'age_type',
                "className" => 'search--col'
            ],
            [
                'name' => 'countStudent',
                'data' => 'countStudent',
                'title' => 'count Student',
                "className" => 'not--search--col'
            ],

            ['name' => 'edit', 'data' => 'edit', 'title' => 'Edit', 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'],

            ['name' => 'delete', 'data' => 'delete', 'title' => 'Delete', 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Group_' . date('YmdHis');
    }
}