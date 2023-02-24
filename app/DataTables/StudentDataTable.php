<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('edit', function ($query) {
                return view('pages.student.datatable.edit', compact('query'));
            })
            ->addColumn('delete', 'pages.student.datatable.delete')
            ->editColumn('name', function ($q) {
                return "<a class='text-primary' href=" . route('admin.student.show', $q->id) . " title='Enter Page show Student' >" . $q->name . "</a>";
            })
            ->editColumn('show', function ($q) {
                return "<a class='text-info' href=" . route('admin.student.show', $q->id) . " title='Enter Page show Student' ><i class='fa-solid fa-eye'></i></a>";
            })
            ->editColumn('countGroups', function ($q) {
                return $q->group_students_count;
            })
            ->editColumn('role.name',function($q){
                return $q->role->name ?? '';
            })
            ->rawColumns(['edit', 'delete', 'name','show'])
            ->setRowId('id');
    }

    public function query(): QueryBuilder
    {
        return Student::students()->with('role:id,name')->withCount('groupStudents');
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
                    initEditeStudentModal()
                }",

            ]);
    }

    protected function getColumns(): array
    {
        $columns = [
            [
                'name' => 'students.id',
                'data' => 'id',
                'title' => 'رقم الهوية',
                "className" => 'search--col exact'
                ],

            [
                'name' => 'name',
                'data' => 'name',
                'title' => ' الاسم',
                "className" => 'search--col'
            ],

            [
                'name' => 'email',
                'data' => 'email',
                'title' => 'البريد الإلكتروني',
                "className" => 'search--col'
            ],

            [
                'name' => 'role.name', 
                'data' => 'role.name',
                'title' => 'الوظيفة',
                 "className" => 'search--col'
            ],

            [
                'name' => 'birthday',
                'data' => 'birthday',
                'title' => ' تاريخ الميلاد',
                "className" => 'search--col'
            ],

            [
                'name' => 'phone',
                'data' => 'phone',
                'title' => ' الهاتف',
                "className" => 'search--col'
            ],

            [
                'name' => 'countGroups',
                'data' => 'countGroups',
                'title' => ' عدد الجروبات',
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
            ],
        ];

        if(userCan('show-student'))
        {
            $columns [] = [
                'name' => 'show',
                'data' => 'show',
                'title' => 'المزيد',
                'printable' => false,
                'exportable' => false, 
                'orderable' => false,
                'searchable' => false, 
                "className" => 'not--search--col'
            ];
        }

        if(userCan('update-student'))
        {
            $columns [] = [
                'name' => 'edit',
                'data' => 'edit',
                'title' => 'تعديل',
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false, 
                "className" => 'not--search--col'
            ];
        }

        if(userCan('delete-student'))
        {
            $columns [] = [
                'name' => 'delete',
                'data' => 'delete',
                'title' => 'حذف',
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
        return 'Student_' . date('YmdHis');
    }
}
