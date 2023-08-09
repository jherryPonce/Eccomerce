<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kardexes', function (Blueprint $table) {
            $table->id();
            $table->string('Documento');
            $table->unsignedBigInteger('Entrada')->nullable()->nullable();
            $table->unsignedBigInteger('Salida')->nullable();
            $table->float('PrecioC');
            $table->float('PrecioV');
            $table->unsignedBigInteger('InventarioIni')->nullable();
            $table->unsignedBigInteger('InventarioFinal')->nullable();

             
            $table->unsignedBigInteger('idProduct');
            $table->foreign('idProduct')->references('id')->on('products')->onDelete('cascade');

            /* $table->unsignedBigInteger('idAlmacen');
            $table->foreign('idAlmacen')->references('id')->on('stocks');

            $table->unsignedBigInteger('idMovimiento');
            $table->foreign('idMovimiento')->references('id')->on('tipo_movimientos'); */

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
        Schema::dropIfExists('kardex');
    }
}
