<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Создание администратора
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('administrator');

        // Создание менеджера
        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
        ]);
        $manager->assignRole('manager');

        // Создание клиента
        $client = User::create([
            'name' => 'Client',
            'email' => 'client@example.com',
            'password' => Hash::make('password'),
        ]);
        $client->assignRole('client');
    }
}
