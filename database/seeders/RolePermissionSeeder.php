<?php

namespace Database\Seeders;

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
         // Membuat izin
         Permission::create(['name' => 'manage users']);
         Permission::create(['name' => 'manage products']);
         Permission::create(['name' => 'view products']);
         Permission::create(['name' => 'make purchases']);

         // Membuat peran dan menambahkan izin
         $adminRole = Role::create(['name' => 'admin']);
         $merchantRole = Role::create(['name' => 'merchant']);
         $customerRole = Role::create(['name' => 'customer']);

         // Menetapkan izin ke peran
         $adminRole->givePermissionTo(['manage users', 'manage products', 'view products', 'make purchases']);
         $merchantRole->givePermissionTo(['manage products', 'view products', 'make purchases']);
         $customerRole->givePermissionTo(['view products', 'make purchases']);
    }
}
