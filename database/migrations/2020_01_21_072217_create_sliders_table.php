<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops')->onDelete('cascade');
            $table->text('title');
            $table->longText('description')->nullable();
            $table->longText('image');
            $table->text('url');
            $table->integer('orden')->default(1);
            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('sliders');
    }
}
