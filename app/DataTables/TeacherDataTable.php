<?php

namespace App\DataTables;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;


class TeacherDataTable extends DataTable
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
            // ->addColumn('edit', 'pages.teacher.datatable.edit')

            ->editColumn('groups.count', function ($query) {
                return $query->groups->count() ?? '';
            })
            ->editColumn('groupStudents.count', function ($query) {
                return $query->groupStudents->count() ?? '';
            })
            ->addColumn('edit', function ($query) {
                return view('pages.teacher.datatable.edit', compact('query'));
            })
            ->addColumn('delete', 'pages.teacher.datatable.delete')
            ->editColumn('name', function ($q) {
                return "<a class='text-primary' href=" . route('admin.teacher.show', $q->id) . " title='Enter Page show Teacher' >" . $q->name . "</a>";
            })
            ->editColumn('avatar', 'pages.teacher.datatable.avatar')
            ->editColumn('show', function ($q) {
                return "<a class='text-primary' href=" . route('admin.teacher.show', $q->id) . " title='Enter Page show Teacher' ><i class='fa-solid fa-eye'></i></a>";
            })
            ->rawColumns(['edit', 'delete', 'name', 'show', 'avatar'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Teacher $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Teacher $model): QueryBuilder
    {
        // return $model->newQuery();
        return $model->with(['groups','groupStudents']);
        // $qeary = $model->with(['groups','groupStudents']);

        // dd($qeary->take(10)->get());
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
                    initEditeTeacherModal()
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
            ['name' => 'id', 'data' => 'id', 'title' => 'رقم الهوية', "className" => 'search--col exact'],
            ['name' => 'name', 'data' => 'name', 'title' => ' الاسم', "className" => 'search--col'],
            ['name' => 'avatar', 'data' => 'avatar', 'title' => ' الصور', "className" => 'search--col'],
            ['name' => 'birthday', 'data' => 'birthday', 'title' => ' تاريخ الميلاد', "className" => 'search--col'],
            ['name' => 'phone', 'data' => 'phone', 'title' => ' الهاتف', "className" => 'search--col'],

            ['name' => 'qualification', 'data' => 'qualification', 'title' => ' المؤهلات', "className" => 'search--col'],

            ['name' => 'groups.count', 'data' => 'groups.count', 'title' => 'عدد الجروبات', "className" => 'search--col'],

            ['name' => 'groupStudents.count', 'data' => 'groupStudents.count', 'title' => 'عدد الطلاب', "className" => 'search--col'],


            ['name' => 'show', 'data' => 'show', 'title' => 'Show', 'printable' => false, 'exportable' => false, 'orderable' => false, 'searchable' => false, "className" => 'not--search--col'],

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
        return 'Teacher_' . date('YmdHis');
    }
}
