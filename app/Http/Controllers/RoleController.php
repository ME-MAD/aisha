<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    private $roleModel;

    public function __construct(Role $role)
    {
        $this->roleModel = $role;
    }

    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.role.index');
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $this->roleModel::create($request->validated());

        Alert::toast('تمت العملية بنجاح', 'success');
        return back();
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description,
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return back();
    }

    public function delete(Role $role)
    {
        $role->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return back();
    }
}
