<?php

namespace App\DataTables;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($query) {
                return view('pages.role.datatable.actions', compact('query'));
            })
            ->rawColumns(['actions'])
            ->setRowId('id');
    }


    public function query(Role $model): QueryBuilder
    {

        return $model::select(
            [
                'id',
                'name',
                'display_name',
                'description'
            ]
        );

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
            }",

        ]);
    }


    public function getColumns(): array
    {
        return [

            Column::make('id', 'id'),
            Column::make('name', 'name'),
            Column::make('display_name', 'display_name'),
            Column::make('description', 'description'),
            Column::make('actions', 'actions'),

        ];
    }


    protected function filename(): string
    {
        return 'Role_' . date('YmdHis');
    }
}
