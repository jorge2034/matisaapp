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
     * The views that need to be exported.
     *
     * @var array
     */
    protected $views = [
        'auth/login.stub' => 'auth/login.blade.php',
        'auth/register.stub' => 'auth/register.blade.php',
        'auth/verify.stub' => 'auth/verify.blade.php',
        'auth/passwords/email.stub' => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'auth/passwords/reset.blade.php',
        'layouts/app.stub' => 'layouts/app.blade.php',
        'home.stub' => 'home.blade.php',
    ];
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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
     //   $this->line('CONTROLADOR');
     //   $variable = $this->ask('Variable. Ej. invVehiculos');       //
     //   $rutaView = $this->ask('Ruta de la vista. Ej. inventario.vehiculos');
     //   $carpeta = $this->ask('Carpeta. Ej. Inventario');
     //   $this->line('MIGRACION');
      //  $nameSnakecase = $this->ask('Tabla migracion. Ej. inv_vehiculos');
        //  $this->line('Carpeta: '.$carpeta);
        //$name = InvVehiculo, $variable = invVehiculos, $rutaView = inventario.vehiculos , $carpeta = Inventario
     //   $this->controller($name,$variable,$rutaView,$carpeta);
     //   $this->model($name);
        //$this->migration($name,$nameSnakecase);
       // $this->request($name);
       // $this->line('VIEWS');
        $title = "Casa";// $this->ask('Titulo. Ej. Vehiculos');
        $variable = "alqCasas";//$this->ask('Variable. Ej. invVehiculos');
        $permiso = "alqcasas";//$this->ask('Permiso. Ej. invvehiculos');
        $variablesingular = "alqCasa";//$this->ask('Variable Singular. Ej. invVehiculo');
        $carpetaView = "casas2";//$this->ask('Carpeta views Ej. vehiculos');
        $modulo = "alquiler2";//$this->ask('Modulo Ej. inventario');
        $this->views($title,$variable,$permiso,$variablesingular,$carpetaView,$modulo);
     //   File::append(base_path('routes/api.php'), 'Route::resource(\'' . str_plural(strtolower($name)) . "', '{$name}Controller');");
    }
}
