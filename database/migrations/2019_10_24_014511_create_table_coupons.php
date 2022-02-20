<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoupons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');

            $table->text('title');
            $table->string('code',50);
            $table->enum('type',['Monto','Porcentaje']);
            $table->enum('type_coupon',['Formularios','Administrativo','Ofertas','Tienda']);
            $table->decimal('value');
            $table->decimal('value_min');
            $table->dateTime('expirated');
            $table->boolean('active');

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
        Schema::dropIfExists('coupons');
    }
}
