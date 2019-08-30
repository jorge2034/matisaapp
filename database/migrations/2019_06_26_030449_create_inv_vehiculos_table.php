<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inv_marca_id')->unsigned()->index();
            $table->integer('inv_categoria_id')->unsigned()->index();
            $table->integer('archivo_id')->unsigned()->nullable();
            $table->string('modelo');
            $table->longText('info_extra')->nullable();
            $table->string('transmision')->nullable();
            $table->string('cilindrada')->nullable();
            $table->longText('imagenes')->nullable();
            $table->string('tipo_combustible')->nullable();
            $table->string('status')->default('ENABLED');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('inv_marca_id')->references('id')->on('inv_marcas');
            $table->foreign('inv_categoria_id')->references('id')->on('inv_categorias');
            $table->foreign('archivo_id')->references('id')->on('archivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inv_vehiculos');
    }
}
