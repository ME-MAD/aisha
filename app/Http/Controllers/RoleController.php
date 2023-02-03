<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Traits\AuthTrait;
use App\Jobs\AttachPermissionsToRoleJob;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    use AuthTrait;

    public function __construct()
    {
        $this->handlePermissions([
            'index' => 'index-role',
            'store' => 'store-role',
            'update' => 'update-role',
            'delete' => 'delete-role',
            'edit' => 'edit-role',
            'create' => 'create-role',
        ]);
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
        $rolePermissions = $role->permissions()->select('name')->get()->pluck('name');

        return view('pages.role.edit', [
            'role' => $role,
            'rolePermissions' => $rolePermissions->toArray(),
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

        PermissionRole::where('role_id', $role->id)->delete();

        AttachPermissionsToRoleJob::dispatch($allPermissionsNames, $role);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.role.index'));
    }

    public function delete(Role $role): RedirectResponse
    {
        PermissionRole::where('role_id', $role->id)->delete();
        $role->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return back();
    }


    private function getAllPermissionNames($requestPermissions): array
    {
        $allPermissionsNames = [];

        if (!is_null($requestPermissions)) {
            foreach ($requestPermissions as $table => $permissions) {
                foreach ($permissions as $permission) {
                    $allPermissionsNames [] = $permission;
                }
            }
        }

        return $allPermissionsNames;
    }
}
