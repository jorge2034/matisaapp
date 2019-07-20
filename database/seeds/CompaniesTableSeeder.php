<?php

use App\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'nombre'=>'Matisa Autos Oruro',
            'descripcion'=>'Casa Matriz de Matisa Autos',
            'direccion1' => 'CALLE HERRERA #404, ENTRE TARAPACÁ Y TACNA',
            'telefono1'=>'25280630'
        ]);
        Company::create([
            'nombre'=>'Matisa Autos Santa Cruz',
            'descripcion'=>'Matisa Autos Santa Cruz',
            'direccion1' => 'X',
            'telefono1'=>'754821464'
        ]);
    }
}
