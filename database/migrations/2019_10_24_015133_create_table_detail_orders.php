<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetailOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->integer('q');
            $table->decimal('price');
            $table->decimal('price_sale');
            $table->string('unit')->nullable();
            $table->boolean('gift');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')->onDelete('cascade');

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attribute_products')->onDelete('cascade');

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
        Schema::dropIfExists('detail_orders');
    }
}
