<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNaturalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('naturals', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('telf')->nullable();
            $table->string('Dni')->unique();
            $table->boolean('tipo')->default('0');
            
            $table->string('ciudad'); 

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

         

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
        Schema::dropIfExists('naturals');
    }
}
