<?php

namespace App\DataTables;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LessonsDataTable extends DataTable
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
            // ->addColumn('edit', 'pages.lesson.datatable.edit')
            ->addColumn('edit', function ($query) {
                return view('pages.lesson.datatable.edit', compact('query'));
            })
            ->addColumn('delete', 'pages.lesson.datatable.delete')
            ->editColumn('subject.name', function ($q) {
                return $q->subject->name ?? "";
            })

            ->rawColumns(['edit', 'delete'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Lesson $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): QueryBuilder
    {
        return Lesson::Lessons()->with([
            'subject:id,name',
        ]);
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
                initEditeLessonModal()
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
                'name' => 'id',
                'data' => 'id',
                'title' => trans('main.num'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'subject_id',
                'data' => 'subject.name',
                'title' => trans('main.subject'),
                "className" => 'search--col'
            ],

            [
                'name' => 'title',
                'data' => 'title',
                'title' => trans('main.title'),
                "className" => 'search--col'
            ],
            [
                'name' => 'from_page',
                'data' => 'from_page',
                'title' => trans('lesson.from_page'),
                "className" => 'search--col'
            ],
            [
                'name' => 'to_page',
                'data' => 'to_page',
                'title' => trans('lesson.to_page'),
                "className" => 'search--col'
            ],

            [
                'name' => 'chapters_count',
                'data' => 'chapters_count',
                'title' =>  trans('lesson.chapters_count'),
                "className" => 'search--col'
            ],
        ];

        if(userCan('update-lesson'))
        {
            $columns [] =  [
                'name' => 'edit',
                'data' => 'edit',
                'title' => trans('main.edit'),
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
            ];
        }

        if(userCan('delete-lesson'))
        {
            $columns [] =  [
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
        return 'Lessons_' . date('YmdHis');
    }
}