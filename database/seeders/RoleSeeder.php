<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Verifica si el rol ya existe antes de crearlo
        $role1 = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $role2 = Role::firstOrCreate(['name' => 'Cliente', 'guard_name' => 'web']);

        // Asigna permisos al rol solo si se acaba de crear
        if ($role1->wasRecentlyCreated) {
            // Crea los permisos para Home
            Permission::create(['name' => 'Admin.Home_Index', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);

            // Crea los permisos para Category
            Permission::create(['name' => 'Admin.Category_Index', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'Admin.Category_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Category_Search', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'Admin.Category_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Category_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Product
            Permission::create(['name' => 'Admin.Product_Index', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'Admin.Product_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Product_Search', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'Admin.Product_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Product_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Pos
            Permission::create(['name' => 'Admin.Pos_Index', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
    
            // Crea los permisos para Role
            Permission::create(['name' => 'Admin.Role_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Role_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Role_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Role_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Role_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Permiso
            Permission::create(['name' => 'Admin.Permiso_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Permiso_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Permiso_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Permiso_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Permiso_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Asignar
            Permission::create(['name' => 'Admin.Asignar_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Usuarios
            Permission::create(['name' => 'Admin.Usuarios_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Usuarios_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Usuarios_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Usuarios_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Usuarios_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Coin
            Permission::create(['name' => 'Admin.Coin_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Coin_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Coin_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Coin_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
            Permission::create(['name' => 'Admin.Coin_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
    
            // Crea los permisos para Cashout
            Permission::create(['name' => 'Admin.Cashout_Index', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
    
            // Crea los permisos para Report
            Permission::create(['name' => 'Admin.Report_Index', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
        }

        /*$role1 = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        $role2 = Role::create(['name' => 'Cliente', 'guard_name' => 'web']);

         // Crea los permisos para Category
         Permission::create(['name' => 'Admin.Category_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Category_Create', 'guard_name' => 'web'])->syncRoles([$role1, $role2]);
         Permission::create(['name' => 'Admin.Category_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Category_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Category_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Product
         Permission::create(['name' => 'Admin.Product_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Product_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Product_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Product_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Product_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Pos
         Permission::create(['name' => 'Admin.Pos_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Role
         Permission::create(['name' => 'Admin.Role_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Role_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Role_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Role_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Role_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Permiso
         Permission::create(['name' => 'Admin.Permiso_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Permiso_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Permiso_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Permiso_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Permiso_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Asignar
         Permission::create(['name' => 'Admin.Asignar_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Usuarios
         Permission::create(['name' => 'Admin.Usuarios_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Usuarios_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Usuarios_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Usuarios_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Usuarios_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Coin
         Permission::create(['name' => 'Admin.Coin_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Coin_Create', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Coin_Search', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Coin_Update', 'guard_name' => 'web'])->syncRoles([$role1]);
         Permission::create(['name' => 'Admin.Coin_Destroy', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Cashout
         Permission::create(['name' => 'Admin.Cashout_Index', 'guard_name' => 'web'])->syncRoles([$role1]);
 
         // Crea los permisos para Report
         Permission::create(['name' => 'Admin.Report_Index', 'guard_name' => 'web'])->syncRoles([$role1]);*/
    }
}
