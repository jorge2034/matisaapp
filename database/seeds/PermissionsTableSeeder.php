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
        $permisos = array(
            //permiso en plural => 'texto a mostrar'
            'users' => 'usuarios',
            'roles' => 'roles',
            'monedas' => 'monedas',
            'empresas' => 'empresas',
            'invcategorias'=>'categorias(Inventario)',
            'invmarcas' => 'marcas(Inventario)'
        );
        $this->generarPermisos($permisos);
    }



    public function generarPermisos($permisos=array()){
        //permiso en plural
        foreach($permisos as $permiso => $texto){
            Permission::create([
                'name'  =>'Navegar '. $texto,
                'slug'  =>$permiso.'.index',
                'description'   => 'Lista y navegación de '.$texto.' del sistema',
                'company_id' => 1,
            ]);
            Permission::create([
                'name'  =>'Ver detalle de cada '.$texto,
                'slug'  =>$permiso.'.show',
                'description'   => 'Ver detalle de cada '.$texto.' del sistema',
                'company_id' => 1,
            ]);
            Permission::create([
                'name'  =>'Creacion de '.$texto,
                'slug'  =>$permiso.'.create',
                'description'   => 'Crear '.$texto.' del sistema',
                'company_id' => 1,
            ]);
            Permission::create([
                'name'  =>'Edicion de '.$texto,
                'slug'  =>$permiso.'.edit',
                'description'   => 'Editar '.$texto.' del sistema',
                'company_id' => 1,
            ]);
            Permission::create([
                'name'  =>'Eliminar '.$texto,
                'slug'  =>$permiso.'.destroy',
                'description'   => 'Eliminar '.$texto.' del sistema',
                'company_id' => 1,
            ]);
        }

    }
}
