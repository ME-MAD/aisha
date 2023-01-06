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
            ->setTableId('role-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0, 'desc')
            ->selectStyleSingle();
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
