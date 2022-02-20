<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('user_id');

            $table->text('first_name');
            $table->text('last_name');
            $table->date('birthdate')->nullable();
            $table->text('code');
            $table->text('city');
            $table->text('address');
            $table->text('phone')->nullable();
            $table->boolean('request_lider')->nullable();
            $table->boolean('is_lider')->nullable();
            $table->boolean('is_empresaria')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');

            $table->foreign('parent_id')
                ->references('id')
                ->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
