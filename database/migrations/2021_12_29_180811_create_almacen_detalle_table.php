<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacen_detalle', function (Blueprint $table) {
            $table->id();
            $table->string('stock');
            $table->string('minimo');
            $table->string('maximo');

            $table->unsignedBigInteger('idProducts');
            $table->foreign('idProducts')->references('id')->on('products');

            $table->unsignedBigInteger('idAlmacen');
            $table->foreign('idAlmacen')->references('id')->on('stocks');

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
        Schema::dropIfExists('almacen_detalle');
    }
}
