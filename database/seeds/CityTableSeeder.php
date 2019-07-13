<?php

use App\SysContry;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $ciudades_bolivia = array(
        //permiso en plural => 'texto a mostrar'
        'or' => ['nombre'=>'Oruro','codigo'=>'OR','departamento'=>'Oruro','provincia'=>'Oruro'],
        'lp ' => ['nombre'=>'La Paz','codigo'=>'LP','departamento'=>'La Paz','provincia'=>'La Paz'],
        'sc' => ['nombre'=>'Santa Cruz','codigo'=>'SC','departamento'=>'Santa Cruz','provincia'=>'Santa Cruz de la sierra'],
        'cb' => ['nombre'=>'Cochabamba','codigo'=>'CB','departamento'=>'Cochabamba','provincia'=>'Cochabamba'],
        'pt' => ['nombre'=>'Potosi','codigo'=>'PT','departamento'=>'Potosi','provincia'=>'Potosi'],
        'su' => ['nombre'=>'Sucre','codigo'=>'SU','departamento'=>'Sucre','provincia'=>'Chuquisaca'],
        'tj' => ['nombre'=>'Tarija','codigo'=>'TJ','departamento'=>'Tarija','provincia'=>'Tarija'],
        'be' => ['nombre'=>'Beni','codigo'=>'BE','departamento'=>'Beni','provincia'=>'Trinidad'],
        'pa' => ['nombre'=>'Pando','codigo'=>'PA','departamento'=>'Pando','provincia'=>'Cobija']
    );
    public function run()
    {

        $pais = SysContry::create([
            'nombre'  =>'Bolivia',
            'codigo'  =>'Bo',
            'status'  =>'ENABLED',
            'created_at' => '2019-03-27 16:40:08',
            'updated_at' => '2019-03-27 16:40:08',
        ]);
        $this->generarCiudades($this->ciudades_bolivia,$pais->id);
    }

    public function generarCiudades($ciudades=array(),$pais_id){
        //permiso en plural
        foreach($ciudades as $ciudad){
            \App\SysCity::create([
                'contry_id'=>$pais_id,
                'nombre'  =>$ciudad['nombre'],
                'codigo'  =>$ciudad['codigo'],
                'region_name'   => $ciudad['departamento'],
                'region_capital' =>$ciudad['provincia'],
                'status' => 'ENABLED',
            ]);
        }
    }
}
