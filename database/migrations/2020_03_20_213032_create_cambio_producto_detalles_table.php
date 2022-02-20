<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambioProductoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_product_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cambio_producto_id');
            $table->foreign('cambio_producto_id')
                ->references('id')
                ->on('change_products')->onDelete('cascade');

            $table->unsignedBigInteger('product_change_id');
            $table->foreign('product_change_id')
                ->references('id')
                ->on('attribute_products')->onDelete('cascade');

            $table->integer('product_change_q');

            $table->unsignedBigInteger('product_deliver_id');

            $table->foreign('product_deliver_id')
                ->references('id')
                ->on('attribute_products')->onDelete('cascade');

            $table->integer('product_deliver_q');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_product_details');
    }
}
