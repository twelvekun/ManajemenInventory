<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Product permissions
            'view-products',
            'create-products',
            'edit-products',
            'delete-products',
            
            // Sales permissions
            'view-sales',
            'create-sales',
            'edit-sales',
            'delete-sales',
            
            // Report permissions
            'view-reports',
            'create-reports',
            
            // Prediction permissions (admin only)
            'view-predictions',
            
            // Overall data permissions (admin only)
            'view-overall-data',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Admin role with all permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Create User role with limited permissions
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'view-products',
            'create-products',
            'edit-products',
            'delete-products',
            'view-sales',
            'create-sales',
            'edit-sales',
            'delete-sales',
            'view-reports',
            'create-reports',
        ]);

        // Create default admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Create default user (karyawan)
        $user = User::create([
            'name' => 'Karyawan',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
    }
}
