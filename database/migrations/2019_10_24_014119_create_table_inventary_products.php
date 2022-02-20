<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableInventaryProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventary_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');


            $table->enum('type',['ENTRADA','SALIDA']);
            $table->integer('q');

            $table->unsignedBigInteger('attribute_product_id');
            $table->foreign('attribute_product_id')
                ->references('id')
                ->on('attribute_products')->onDelete('cascade');

            $table->text('description');


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
        Schema::dropIfExists('inventary_products');
    }
}
