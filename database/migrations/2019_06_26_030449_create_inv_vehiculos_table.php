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
            $table->integer('company_id')->unsigned()->index();
            $table->string('num_kardex')->nullable();
            $table->string('modelo');
            $table->longText('info_extra')->nullable();
            $table->integer('inv_marca_id')->unsigned()->index();
            $table->integer('inv_categoria_id')->unsigned()->index();
            $table->integer('inv_almacen_id')->unsigned()->index();
            $table->string('year')->nullable();
            $table->string('color')->nullable();
            $table->double('precio_compra', 8, 2)->nullable();
            $table->double('precio_venta', 8, 2)->nullable();
            $table->double('precio_compra_sus', 8, 2)->nullable();
            $table->double('precio_venta_sus', 8, 2)->nullable();
            $table->string('num_motor')->nullable();
            $table->string('num_chasis')->nullable();
            $table->string('transmision')->nullable();
            $table->string('cilindrada')->nullable();
            $table->integer('archivo_id')->unsigned()->nullable();
            $table->json('imagenes')->nullable();
            $table->string('tipo_combustible')->nullable();
            $table->string('status')->default('ENABLED');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('inv_marca_id')->references('id')->on('inv_marcas');
            $table->foreign('inv_categoria_id')->references('id')->on('inv_categorias');
            $table->foreign('inv_almacen_id')->references('id')->on('inv_alamcenes');
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
