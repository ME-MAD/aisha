<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Traits\AuthTrait;
use App\Models\User;
use App\Services\Role\RoleService;
use App\Services\User\UserService;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    use  AuthTrait;

    private UserService $userService;
    private RoleService $roleService;

    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;

        $this->roleService = $roleService;

        $this->handlePermissions([
            'index' => 'index-user',
            'store' => 'store-user',
            'update' => 'update-user',
            'delete' => 'delete-user',
        ]);
    }

    public function index(UserDataTable $userDataTable)
    {
        $roles = $this->roleService->getRoles(['name']);

        return $userDataTable->render('pages.user.index', [
            'roles' => $roles
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->createUser($request);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userService->updateUser($request, $user);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect()->back();
    }

    public function delete(User $user): RedirectResponse
    {
        $this->userService->deleteUser($user);

        Alert::success('نجاح', 'تمت العملية بنجاح');
        return redirect()->back();
    }
}
