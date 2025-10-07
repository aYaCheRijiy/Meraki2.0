<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class databaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);

        // Создаем супер-администратора
        $superAdmin = User::factory()->create([
            'name' => 'Главный Админ',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->roles()->attach(Role::where('name', 'super_admin')->first());

        // Создаем обычного администратора
        $admin = User::factory()->create([
            'name' => 'Обычный Админ',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->roles()->attach(Role::where('name', 'admin')->first());

        // Создаем обычного пользователя
        $user = User::factory()->create([
            'name' => 'Обычный Пользователь',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first());
    }
}
