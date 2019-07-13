<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_city', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contry_id')->unsigned()->index();
            $table->foreign('contry_id')->references('id')->on('sys_contry');
            $table->string('nombre');
            $table->string('codigo')->nullable();
            $table->string('region_name')->nullable();
            $table->string('region_capital')->nullable();
            $table->string('status')->default('ENABLED');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_city');
    }
}
