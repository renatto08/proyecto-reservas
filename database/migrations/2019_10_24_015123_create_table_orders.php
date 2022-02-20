<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');

            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->unsignedBigInteger('discount')->nullable();
            $table->unsignedBigInteger('discount_offer')->nullable();


            $table->text('flete_address')->nullable();
            $table->decimal('flete')->nullable();
            $table->decimal('amount_discount_aditional')->default(0);
            $table->decimal('amount_discount');
            $table->decimal('amount_discount_offer');
            $table->unsignedBigInteger('user_id');
            $table->enum('status',[
                'CERRADO'=>'Cerrado',
        'PROPUESTA'=>'Propuesta',
        'RESERVA'=>'Reserva',
        'PROGRESO'=>'Progreso',
        'VENTA'=>'Venta',
        'VALIDACION'=>'Validacion',
        'ANULADO'=>'Anulado'
            ]);
            $table->decimal('sub_total');
            $table->decimal('sub_total_offer');
            $table->decimal('total');
            $table->enum('payment',
                ['EFECTIVO', 'TARJETA', 'DEPOSITO']);
            $table->string('name_bank',300);
            $table->longText('description')->nullable();
            $table->longText('flete_address_text')->nullable();



            $table->foreign('client_id')
                ->references('id')
                ->on('clients')->onDelete('cascade');

            $table->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')->onDelete('cascade');

            $table->foreign('coupon_id')
                ->references('id')
                ->on('coupons')->onDelete('cascade');

            $table->foreign('discount')
                ->references('id')
                ->on('coupons')->onDelete('cascade');

            $table->foreign('discount_offer')
                ->references('id')
                ->on('coupons')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
