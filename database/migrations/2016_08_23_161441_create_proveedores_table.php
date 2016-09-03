<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('ruc');
            $table->string('telefono')->nullable();
            $table->text('direccion')->nullable();
            $table->string('nombre_contacto')->nullable();
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
        Schema::drop('proveedores');
    }
}
