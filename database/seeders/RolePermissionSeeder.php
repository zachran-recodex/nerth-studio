<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $customerRole = Role::create([
            'name' => 'customer',
        ]);

        $users = [
            [
                'first_name' => 'Fajri',
                'last_name' => 'Hafizh',
                'birth_date' => '19-10-2002',
                'email' => 'fajri.hafizh99@gmail.com',
                'password' => bcrypt('191002'),
                'role' => $adminRole,
            ],
            [
                'first_name' => 'Adnin',
                'last_name' => 'Farizi',
                'birth_date' => '10-10-2002',
                'email' => 'adninfarizi12@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => $adminRole,
            ],
            [
                'first_name' => 'Ahmad',
                'last_name' => 'Fabiansyah',
                'birth_date' => '10-10-2002',
                'email' => 'ahmadfabiansyah@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => $adminRole,
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'birth_date' => $userData['birth_date'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            $user->assignRole($userData['role']);
        }
    }
}
