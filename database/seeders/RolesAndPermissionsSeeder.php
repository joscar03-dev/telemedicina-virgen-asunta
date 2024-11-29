<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Roles
        $admin = Role::create(['name' => 'Admin']);
        $medico = Role::create(['name' => 'Medico']);
        $paciente = Role::create(['name' => 'Paciente']);

        // Crear Permisos
        Permission::create(['name' => 'gestionar usuarios']);
        Permission::create(['name' => 'crear citas']);
        Permission::create(['name' => 'ver citas']);
        Permission::create(['name' => 'gestionar especialidades']);

        // Asignar Permisos a Roles
        $admin->givePermissionTo(['gestionar usuarios', 'gestionar especialidades']);
        $medico->givePermissionTo(['ver citas']);
        $paciente->givePermissionTo(['crear citas']);
    }
}
