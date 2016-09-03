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
            $table->string('precio');
            $table->string('stock');
            $table->string('id_categoria');
            $table->string('id_proveedor');
            $table->string('precio_unitario');
            $table->string('precio_venta');
            $table->string('descuento');
            $table->string('iva');
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
