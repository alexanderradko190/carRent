<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserService
{
    public function registerUser(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $role = $data['role'];

        if ($role === 'administrator') {
            $role = 'administrator';
        } else if ($role === 'manager') {
            $role = 'manager';
        } else {
            $role = 'client';
        }

        if (!Role::where('name', $role)->exists()) {
            throw new \Exception("Role {$role} does not exist");
        }

        $user->assignRole($role);
        return $user;
    }

    public function authenticateUser(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }
        return Auth::user();
    }

    public function logoutUser(mixed $user)
    {
        $user->tokens()->delete();
    }
}
