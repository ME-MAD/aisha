<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser($request): void
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->attachRole($request->role);
    }

    public function updateUser($request, $user): void
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        $user->detachRole($user->role);
        $user->attachRole($request->role);
    }


    public function deleteUser($user): void
    {
        $user->detachRole($user->role);
        $user->delete();
    }
}
