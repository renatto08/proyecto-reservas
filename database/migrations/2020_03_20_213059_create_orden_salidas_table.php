<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');

            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')->onDelete('cascade');

            $table->longText('image')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');
            $table->enum('status',['PENDIENTE','DESPACHADO','ANULADO']);
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
        Schema::dropIfExists('orden_salidas');
    }
}
