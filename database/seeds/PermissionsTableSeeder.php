<?php

use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'  =>'Navegar usuarios',
            'slug'  =>'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Ver detalle de cada usuarios',
            'slug'  =>'users.show',
            'description'   => 'Ver en detalle todos los usuarios del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Edicion de usuarios',
            'slug'  =>'users.edit',
            'description'   => 'Editar cualquier dato de una usuario del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Eliminar usuario',
            'slug'  =>'users.destroy',
            'description'   => 'Eliminar cualquier usuario del sistema',
            'company_id' => 1,
        ]);

        //Roles
        Permission::create([
            'name'  =>'Navegar Roles',
            'slug'  =>'roles.index',
            'description'   => 'Lista y navega todos los Roles del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Ver detalle de cada Roles',
            'slug'  =>'roles.show',
            'description'   => 'Ver en detalle de los Roles del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Creacion de Roles',
            'slug'  =>'roles.create',
            'description'   => 'Crear un Rol del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Edicion de Roles',
            'slug'  =>'roles.edit',
            'description'   => 'Editar cualquier dato de una Rol del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Eliminar Rol',
            'slug'  =>'roles.destroy',
            'description'   => 'Eliminar cualquier Rol del sistema',
            'company_id' => 1,
        ]);

        //Monedas
        Permission::create([
            'name'  =>'Navegar Monedas',
            'slug'  =>'monedas.index',
            'description'   => 'Lista y navega todos los Monedas del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Ver detalle de cada Moneda',
            'slug'  =>'monedas.show',
            'description'   => 'Ver en detalle de los Monedas del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Creacion de Monedas',
            'slug'  =>'monedas.create',
            'description'   => 'Crear un Moneda del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Edicion de Monedas',
            'slug'  =>'monedas.edit',
            'description'   => 'Editar cualquier dato de un Moneda del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Eliminar Moneda',
            'slug'  =>'monedas.destroy',
            'description'   => 'Eliminar cualquier Moneda del sistema',
            'company_id' => 1,
        ]);


        //Empresas
        Permission::create([
            'name'  =>'Navegar empresas',
            'slug'  =>'empresas.index',
            'description'   => 'Lista y navega todos las empresas del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Ver detalle de cada empresa',
            'slug'  =>'empresa.show',
            'description'   => 'Ver en detalle de la empresa del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Creacion de empresas',
            'slug'  =>'empresas.create',
            'description'   => 'Crear una empresa del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Edicion de empresas',
            'slug'  =>'empresas.edit',
            'description'   => 'Editar cualquier dato de un empresa del sistema',
            'company_id' => 1,
        ]);
        Permission::create([
            'name'  =>'Eliminar empresa',
            'slug'  =>'empresas.destroy',
            'description'   => 'Eliminar cualquier empresa del sistema',
            'company_id' => 1,
        ]);
    }
}
