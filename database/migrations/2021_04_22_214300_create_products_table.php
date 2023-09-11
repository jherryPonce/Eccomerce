<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('idproductos');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->float('price');
            $table->string('SKU')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('promocion')->default(0);
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->nullable();
                // $table->foreign('brand_id')->references('id')->on('brands');


            //se hace llamdao al modelo product y las constante y pordefecto borrador
            $table->enum('status',[Product::borrador,Product::publicado])->default(Product::borrador);
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
        Schema::dropIfExists('products');
    }
}
