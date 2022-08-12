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
            ->addColumn('action', 'studentdatatable.action')
            ->setRowId('id');
    }

    public function query(Student $model): QueryBuilder
    {
        return $model->newQuery();
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
                    ['extend' => 'print', 'className' => 'btn btn-primary mr-5px', 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'excel', 'className' => 'btn btn-success ', 'text' => '<i class="fa fa-file"></i> Export '],
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
            ['name' => 'id', 'data' => 'id', 'title' => 'رقم الهوية <input type="text" style="width:100px" id="exact" />'],
            ['name' => 'name', 'data' => 'name', 'title' => 'الاسم <input type="text" style="width:100px"/>'],
            ['name' => 'brithday', 'data' => 'brithday', 'title' => 'تاريخ الميلاد <input type="text" style="width:100px"/>'],
            ['name' => 'phone', 'data' => 'phone', 'title' => 'الهاتف <input type="text" style="width:100px"/>'],
            ['name' => 'type', 'data' => 'type', 'title' => 'النوع <input type="text" style="width:100px"/>'],
            ['name' => 'note', 'data' => 'note', 'title' => 'ملحوظة <input type="text" style="width:100px"/>'],
            ['name' => 'group_id', 'data' => 'group_id', 'title' => 'المجموعة <input type="text" style="width:100px"/>'],
            ['name' => 'edit', 'data' => 'edit', 'title' => 'تعديل'],
        ];
    }

    protected function filename(): string
    {
        return 'Student_' . date('YmdHis');
    }
}
