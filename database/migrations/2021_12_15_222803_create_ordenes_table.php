<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            
            $table->unsignedBigInteger('codpedidos');
            $table->foreign('codpedidos')->references('id')->on('pedidos');

            $table->unsignedBigInteger('codproducts');
            $table->foreign('codproducts')->references('id')->on('products');

            $table->unsignedBigInteger('unidades');
            $table->unsignedDouble('importe');
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
        Schema::dropIfExists('ordenes');
    }
}
