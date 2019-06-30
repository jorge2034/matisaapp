<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerarCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generar:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando generador de crud Matisa Autos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function controller($name,$variable,$rutaView,$carpeta = null)
    {
        if(is_null($carpeta)){
            $namespace = 'namespace App\Http\Controllers;';
        }
        else{
            $namespace = '
            namespace App\Http\Controllers\\'.$carpeta.';
            use App\Http\Controllers\Controller;
            ';
        }
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{variable}}',
                '{{rutaView}}',
                '{{namespace}}'
            ],
            [
                $name,
                $variable,
                $rutaView,
                $namespace
            ],
            $this->getStub('Controller')
        );
        if(is_null($carpeta)){
            $rutaFinal = "/Http/Controllers/{$name}Controller.php";
        }
        else{

            if(!file_exists($path = app_path('/Http/Controllers/'.$carpeta)))
                mkdir($path, 0777, true);
            $rutaFinal = "/Http/Controllers/".$carpeta."/{$name}Controller.php";
        }

        file_put_contents(app_path($rutaFinal), $controllerTemplate);
    }

    protected function model($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Model')
        );

        file_put_contents(app_path("/{$name}.php"), $modelTemplate);
    }

    protected function request($name)
    {
        $requestTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Request')
        );

        if(!file_exists($path = app_path('/Http/Requests')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $requestTemplate);
    }

    protected function migration($name,$nameSnakecase)
    {
        $migrationTemplate = str_replace(
            ['{{migrationName}}','{{migration_name}}'],
            [$name,$nameSnakecase],
            $this->getStub('Migration')
        );
        $nombreArchivo = "/migrations/".date('Y_m_d_His')."_create_{$nameSnakecase}_table.php";
        file_put_contents(database_path($nombreArchivo), $migrationTemplate);
    }

    /**
     * $ruta ej. inventario.vehiculos
     * @param $title ej. Vehiculo
     * $breadcumb ej. invVehiculos
     * @param $variable ej. invVehiculos
     * @param $permiso ej. invvehiculos
     * @param $variablesingular ej. invVehiculo
     * @param $carpeta ej. vehiculos
     * @param $modulo ej. inventario
     */
    protected function views($title,$variable,$permiso,$variablesingular,$carpeta,$modulo=null)
    {
        $path ="";
        $pathPartials ="";
        if(isset($modulo)) {
            if (!is_dir($pathmodulo = resource_path("views/{$modulo}"))) {
                mkdir($pathmodulo, 0755, true);
            }
            if (!is_dir($path = resource_path("views/{$modulo}/{$carpeta}"))) {
                mkdir($path, 0755, true);
            }
            if (!is_dir($pathPartials = resource_path("views/{$modulo}/{$carpeta}/partials"))) {
                mkdir($pathPartials, 0755, true);
            }
            $ruta = "{$modulo}.{$carpeta}";
        }else{
            if (!is_dir($path = resource_path("views/{$carpeta}"))) {
                mkdir($path, 0755, true);
            }
            if (!is_dir($pathPartials = resource_path("views/{$carpeta}/partials"))) {
                mkdir($pathPartials, 0755, true);
            }
            $ruta = $carpeta;
        }

        $rutaView = [  $pathPartials."/filter.blade.php"=>'views/partials/filter',
            $pathPartials."/form.blade.php"=>'views/partials/form',
            $path."/create.blade.php"=>'views/create',
            $path."/edit.blade.php"=>'views/edit',
            $path."/index.blade.php"=>'views/index',
            $path."/show.blade.php"=>'views/show',
        ];

        $breadcumb = $variable;
        $rutaborrar = $carpeta;
        foreach($rutaView as $path => $view){
            $vista = str_replace(
                [
                    '{{ruta}}',
                    '{{title}}',
                    '{{breadcumb}}',
                    '{{variable}}',
                    '{{permiso}}',
                    '{{variablesingular}}',
                    '{{rutaborrar}}',
                ],
                [
                    $ruta,
                    $title,
                    $breadcumb,
                    $variable,
                    $permiso,
                    $variablesingular,
                    $rutaborrar,
                ],
                $this->getStub($view)
            );
            file_put_contents($path, $vista);
        }
    }

    protected function route($name,$title,$permiso,$carpeta,$modulo=null)
    {
        if(isset($modulo))
            $stub = 'route';
        else
            $stub = 'route2';

        $routeTemplate = str_replace(
            [
                '{{title}}',
                '{{modulo}}',
                '{{carpeta}}',
                '{{modelName}}',
                '{{permiso}}'
            ],
            [
                $title,
                $modulo,
                $carpeta,
                $name,
                $permiso
            ],
            $this->getStub($stub)
        );
        file_put_contents(
            base_path('routes/web.php'),
            $routeTemplate,
            FILE_APPEND
        );
    }

    protected function breadcumb($title,$variable,$carpeta,$modulo=null)
    {
        if(isset($modulo)) {
            $ruta = "{$modulo}.{$carpeta}";
        }else{
            $ruta = $carpeta;
        }

        $breadcumbTemplate = str_replace(
            [
                '{{breadcumb}}',
                '{{ruta}}',
                '{{variable}}',
                '{{title}}'
            ],
            [
                $variable,
                $ruta,
                $variable,
                $title,
            ],
            $this->getStub('breadcumb')
        );
        file_put_contents(
            base_path('routes/breadcrumbs.php'),
            $breadcumbTemplate,
            FILE_APPEND
        );
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->line('CONTROLADOR');
        $variable = $this->ask('Variable. Ej. invVehiculos');       //
        $rutaView = $this->ask('Ruta de la vista. Ej. inventario.vehiculos');
        $carpeta = $this->ask('Carpeta Controlador. Ej. Inventario');
        $this->line('MIGRACION');
        $nameSnakecase = $this->ask('Tabla migracion. Ej. inv_vehiculos');
        $this->line('Carpeta: '.$carpeta);
        //$name = InvVehiculo, $variable = invVehiculos, $rutaView = inventario.vehiculos , $carpeta = Inventario
        $this->controller($name,$variable,$rutaView,$carpeta);
        $this->model($name);
        $this->migration($name,$nameSnakecase);
        $this->request($name);
        $this->line('VIEWS');
        $title = $this->ask('Titulo. Ej. Vehiculos');
        $variable = $this->ask('Variable. Ej. invVehiculos');
        $permiso = $this->ask('Permiso. Ej. invvehiculos');
        $variablesingular = $this->ask('Variable Singular. Ej. invVehiculo');
        $carpetaView = $this->ask('Carpeta views Ej. vehiculos');
        $modulo = $this->ask('Modulo Ej. inventario');
        $this->views($title,$variable,$permiso,$variablesingular,$carpetaView,$modulo);
        $this->route($name,$title,$permiso,$carpetaView,$modulo);
        $this->breadcumb($title,$variable,$carpetaView,$modulo);
    }
}
