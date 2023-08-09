<?php

use App\Models\Pedido;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cod');
            $table->foreign('cod')->references('id')->on('proveedors');
            $table->unsignedBigInteger('impuesto');
            $table->unsignedDecimal('total');
            $table->enum('status',[Pedido::Proforma,Pedido::Cancelado,Pedido::Aprobado])->default(Pedido::Proforma);
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
        Schema::dropIfExists('pedidos');
    }
}
