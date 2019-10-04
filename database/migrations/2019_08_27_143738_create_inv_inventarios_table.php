<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->index();
            $table->integer('inv_almacen_id')->nullable()->unsigned();
            $table->integer('inv_vehiculo_id')->unsigned()->index();
            $table->integer('cantidad');
            $table->integer('year')->nullable();
            $table->double('precio_compra_bs')->nullable();
            $table->double('precio_compra_sus')->nullable();
            $table->double('precio_venta_bs')->nullable();
            $table->double('precio_venta_sus')->nullable();
            $table->string('status')->default('ENABLED');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('inv_almacen_id')->references('id')->on('inv_almacenes');
            $table->foreign('inv_vehiculo_id')->references('id')->on('inv_vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_inventarios');
    }
}
