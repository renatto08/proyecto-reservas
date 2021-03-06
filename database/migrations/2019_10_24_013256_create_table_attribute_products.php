<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAttributeProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->text('sku');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->integer('stock');
            $table->integer('alert_stock');



            $table->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')->onDelete('cascade');

            $table->foreign('size_id')
                ->references('id')
                ->on('sizes')->onDelete('cascade');

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
        Schema::dropIfExists('attribute_products');
    }
}
