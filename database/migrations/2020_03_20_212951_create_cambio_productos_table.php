<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCambioProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')->onDelete('cascade');

            $table->string('serie',200)->nullable();

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
        Schema::dropIfExists('change_products');
    }
}
