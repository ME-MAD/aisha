<?php

namespace App\DataTables;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('edit', function ($query) {
                return view('pages.user.datatable.edit', compact('query'));
            })
            ->editColumn('countPermissions', function ($q) {
                return($q->role_permissions_count);
            })
            ->addColumn('delete', 'pages.user.datatable.delete')
            ->addColumn('avatar', 'pages.user.datatable.avatar')
            ->rawColumns(['edit', 'delete','avatar'])
            ->setRowId('id');
    }


    public function query(User $model): QueryBuilder
    {
        return $model::select([
            'users.id',
            'users.name',
            'users.email',
            'users.avatar',
        ])->with('role:id,name')->withCount(['rolePermissions']);
    }
    
    /**
     * Optional method if you want to use html builder.
     *
     * @return HtmlBuilder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
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
                initEditeUserModal()
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
        $columns =  [
            [
                'name' => 'avatar',
                'data' => 'avatar',
                'title' => trans('main.avatar'),
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
            ],
            [
                'name' => 'users.id',
                'data' => 'id',
                'title' => trans('main.num'),
                "className" => 'search--col exact'
            ],

            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans('main.name'),
                "className" => 'search--col'
            ],

            [
                'name' => 'email',
                'data' => 'email',
                'title' => trans('main.email'),
                "className" => 'search--col'
            ],

            [
                'name' => 'role.name',
                'data' => 'role.name',
                'title' => trans('main.role'),
                "className" => 'search--col'
            ],

            [
                'name' => 'countPermissions',
                'data' => 'countPermissions',
                'title' => trans('user.count_permissions'),
                'orderable' => false,
                'searchable' => false,
                "className" => 'not--search--col'
                
            ],
        ];


        if (userCan('update-user')) {
            $columns [] =
            [
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

        if(userCan('delete-user'))
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
        return 'Lessons_' . date('YmdHis');
    }
}
