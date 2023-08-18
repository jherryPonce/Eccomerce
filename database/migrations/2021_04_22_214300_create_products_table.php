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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->float('priceV');
            $table->float('priceC');
            $table->string('SKU')->nullable();
            $table->float('tasaC')->nullable();
            $table->float('Pdolares')->nullable();


            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->nullable();
                // $table->foreign('brand_id')->references('id')->on('brands');

            $table->integer('quantity')->nullable();
            $table->integer('cantmin')->nullable();
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
