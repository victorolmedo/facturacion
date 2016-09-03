<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('stock');
            $table->integer('id_categoria');
            $table->integer('id_proveedor');
            $table->integer('precio_unitario');
            $table->integer('precio_venta');
            $table->integer('descuento');
            $table->integer('iva');
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
        Schema::drop('productos');
    }
}
