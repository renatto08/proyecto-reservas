<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenSalidaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_salida_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('orden_salida_id');
            $table->foreign('orden_salida_id')
                ->references('id')
                ->on('orden_salidas')->onDelete('cascade');

            $table->unsignedBigInteger('detail_order_id');
            $table->foreign('detail_order_id')
                ->references('id')
                ->on('detail_orders')->onDelete('cascade');

            $table->integer('q');
            $table->boolean('check');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orden_salida_detalles');
    }
}
