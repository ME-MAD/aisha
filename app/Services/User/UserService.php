<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function getUserDataTable($userDataTable, $dataWillRenderInDataTable = null)
    {
        return $userDataTable->render('pages.user.index', $dataWillRenderInDataTable);
    }

    public function createUser($request): void
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $this->attachRoleToUser($user, $request->role);

    }

    public function updateUser($request, $user): void
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        $this->detachRoleFromUser($user);
        $this->attachRoleToUser($user, $request->role);
    }


    public function deleteUser($user): void
    {
        $this->detachRoleFromUser($user);
        $user->delete();
    }

    public function attachRoleToUser($user, $role): void
    {
        $user->attachRole($role);
    }

    public function detachRoleFromUser($user): void
    {
        $user->detachRole($user->role);
    }
}
