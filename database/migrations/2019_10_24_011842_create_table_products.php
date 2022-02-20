<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');

            $table->text('title');
            $table->longText('description')->nullable();
            $table->longText('specification')->nullable();
            $table->decimal('price');
            $table->decimal('price_sale');
            $table->integer('stock');
            $table->boolean('new')->default(False);
            $table->boolean('active');
            $table->longText('image')->nullable();
            $table->longText('gallery')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');


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
        Schema::dropIfExists('products');
    }
}
