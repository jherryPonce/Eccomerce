<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users') ->onDelete('cascade');

            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');

            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas') ->onDelete('cascade');

            $table->enum('version_UBL',[2.0,2.1]);
            $table->enum('tipo_factura' ,[0101,0104,0105]);
            $table->enum('tipo_documento',[01,03,07,06]);


            $table->enum('forma_pago',['CONTADO','CREDITO']);
            $table->string('serie');

            $table->integer('correlativo');
            $table->dateTime('fecha_emision');

            $table->double( 'monto_operaciones_gravadas',9,2)->nullable();
            $table->double( 'monto_operaciones_exoneradas',9,2)->nullable();
            $table->double( 'monto_operaciones_gratuitas',9,2)->nullable();

            $table->double( 'monto_IGV',9,2);
            $table->double( 'monto_IGV_gratuitas',9,2);
            $table->double( 'total_impuestos',9,2)->nullable();
            $table->double( 'valor_venta',9,2)->nullable();
            $table->double( 'sub_total',9,2)->nullable();
            $table->double( 'monto_total',9,2)->nullable();

            $table->boolean('is_envio_sunat')->default(0);

            $table->json('respuesta_sunat')->nullable();
            $table->integer('documento_referencia_id')->nullable();


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
        Schema::dropIfExists('documento');
    }
}
