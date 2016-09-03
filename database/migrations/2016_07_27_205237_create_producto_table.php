<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id_producto');
            $table->string('nombre');
            $table->integer('precio');
            $table->integer('stock');
            $table->integer('id_categoria');
            $table->integer('id_proveedor');
            $table->integer('precio_unitario');
            $table->integer('precio_venta');
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
        Schema::drop('producto');
    }
}
