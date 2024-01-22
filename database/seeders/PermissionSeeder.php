<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_masyarakat = Role::create(['name' => 'masyarakat']);
        $role_petugas = Role::create(['name' => 'petugas']);
        $role_admin_web = Role::create(['name' => 'puskesmas']);

    }
}
