<?php

namespace App\DataTables;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($query) {
                return view('pages.role.datatable.actions', compact('query'));
            })
            ->addColumn('show', function ($query) {
                return view('pages.role.datatable.edit', compact('query'));
            })
            ->editColumn('countUsers', function ($q) {
                return($q->role_users_count);
            })
            ->editColumn('countPermissions', function ($q) {
                return($q->role_permissions_count);
            })
            ->rawColumns(['actions','show'])
            ->setRowId('id');
    }


    public function query(Role $model): QueryBuilder
    {

        return $model::select(
            [
                'roles.id',
                'name',
                'display_name',
                'description'
            ]
        )->withCount([
            'roleUsers',
            'rolePermissions'
        ])->with([
            'teachers',
            'students',
            'Users'
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
                initShowRoleUsersModal()
            }",

            ]);
    }


    public function getColumns(): array
    {
        return [

            [
                'name' => 'id',
                'data' => 'id',
                'title' => '#',
                "className" => 'search--col exact'
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => __('roles.name'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'display_name',
                'data' => 'display_name',
                'title' => __('roles.display_name'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'description',
                'data' => 'description',
                'title' => __('roles.description'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'countUsers',
                'data' => 'countUsers',
                'title' => 'عدد المستخدمين',
                "className" => 'search--col exact'
            ],
            [
                'name' => 'countPermissions',
                'data' => 'countPermissions',
                'title' => 'عدد الصلاحيات',
                "className" => 'search--col exact'
            ],
            [
                'name' => 'show',
                'data' => 'show',
                'title' => "إظهار",
                'printable' => false,
                'exportable' => false,
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
            ],

            [
                'actions' => 'actions',
                'data' => 'actions',
                'title' => __('roles.actions'),
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
        return 'Role_' . date('YmdHis');
    }
}
