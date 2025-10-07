<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'super_admin',
                'description' => 'Главный администратор с полными правами',
                'hierarchy_level' => 100,
                'permissions' => json_encode(['*'])
            ],
            [
                'name' => 'admin',
                'description' => 'Обычный администратор',
                'hierarchy_level' => 80,
                'permissions' => json_encode(['users.manage', 'content.manage', 'settings.view'])
            ],
            [
                'name' => 'moderator',
                'description' => 'Модератор',
                'hierarchy_level' => 50,
                'permissions' => json_encode(['content.manage', 'comments.moderate'])
            ],
            [
                'name' => 'user',
                'description' => 'Обычный пользователь',
                'hierarchy_level' => 0,
                'permissions' => json_encode([])
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}
