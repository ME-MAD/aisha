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
            ->addColumn('edit', 'pages.student.datatable.edit')
            ->addColumn('delete', 'pages.student.datatable.delete')
            ->rawColumns(['edit','delete'])
            ->setRowId('id');
    }

    public function query(Student $student): QueryBuilder
    {
        return Student::with('group');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'          => 'Blfrtip',
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
                    this.api().columns().every(function() {
                        var that = this;
                        $('input', this.header()).on('keyup change clear', function() {
                            if (that.search() !== this.value) {
                                if (this.id == 'exact') {
                                    var val = this.value;
                                    that.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                } else {
                                    that.search(this.value).draw();
                                }
                            }
                        });
                    });
                }",
            ]);
    }

    protected function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '<input type="text" style="width:100px" id="exact" /> <br> رقم الهوية'],
            ['name' => 'name', 'data' => 'name', 'title' => '<input type="text" style="width:100px"/> الاسم'],
            ['name' => 'brithday', 'data' => 'brithday', 'title' => '<input type="text" style="width:100px"/> <br> تاريخ الميلاد'],
            ['name' => 'phone', 'data' => 'phone', 'title' => '<input type="text" style="width:100px"/> الهاتف'],
            ['name' => 'note', 'data' => 'note', 'title' => '<input type="text" style="width:100px"/> ملحوظة'],
            ['name' => 'edit', 'data' => 'edit', 'title' => 'Edit','printable' => false,'exportable' => false, 'orderable' => false, 'searchable' => false],
            ['name' => 'delete', 'data' => 'delete', 'title' => 'Delete','printable' => false,'exportable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    protected function filename(): string
    {
        return 'Student_' . date('YmdHis');
    }
}
