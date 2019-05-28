<?php

use Illuminate\Database\Seeder;

class MonedasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\Moneda::class,20)->create();

    }
}
