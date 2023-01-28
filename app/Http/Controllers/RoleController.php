<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Jobs\AttachPermissionsToRoleJob;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function __construct()
    {

    }

    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.role.index');
    }

    public function create()
    {
        return view('pages.role.create');
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        $allPermissionsNames = $this->getAllPermissionNames($request->permissions);
        AttachPermissionsToRoleJob::dispatch($allPermissionsNames, $role);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.role.index'));
    }

    public function edit(Role $role): Factory|View|Application
    {

        $rolePermission = [];
        foreach ($role->permissions as $permission) {
            $rolePermission[] = $permission->name;
        }

        return view('pages.role.edit', [
            'role' => $role,
            'rolePermissions' => $rolePermission,

        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {

        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        $allPermissionsNames = $this->getAllPermissionNames($request->permissions);
        $role->detachPermissions($role->permissions);
        AttachPermissionsToRoleJob::dispatch($allPermissionsNames, $role);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.role.index'));
    }

    public function delete(Role $role): RedirectResponse
    {
        $role->detachPermissions($role->permissions);
        $role->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return back();
    }


    public function getAllPermissionNames($requestPermissions): array
    {
        $allPermissionsNames = [];

        foreach ($requestPermissions as $table => $permissions) {
            foreach ($permissions as $permission) {
                $allPermissionsNames [] = $permission;
            }
        }
        return $allPermissionsNames;
    }
}
