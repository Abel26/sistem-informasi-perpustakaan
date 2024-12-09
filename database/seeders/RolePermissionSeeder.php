<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage book data',
            'manage reading page'
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        // membuat role untuk siswa
        $siswaRole = Role::firstOrCreate([
            'name' => 'siswa'
        ]);

        $studentPermissions = [
            'manage reading page'
        ];

        $siswaRole->syncPermissions($studentPermissions);

        // membuat role untuk admin
        $AdminRole = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $AdminRole->syncPermissions(Permission::all());

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('adminPerpus123'),
            'nisn' => '12345678',
            'kelas' => 'XII',
        ]);

        $user->assignRole($AdminRole);
    }
}
