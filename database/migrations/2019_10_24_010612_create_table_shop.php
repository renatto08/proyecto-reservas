<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('name');
            $table->string('code',50)->unique();
            $table->longText('address');
            $table->text('email');
            $table->text('phone');
            $table->integer('time_reservation')->default(0);
            $table->longText('logo')->nullable();
            $table->longText('logo_shop')->nullable();
            $table->text('theme');

            $table->longText('footer')->nullable();
            $table->longText('contact_description')->nullable();
            $table->longText('contact_map')->nullable();
            $table->longText('banner_sidebar')->nullable();
            $table->longText('banner_top')->nullable();
            $table->longText('banner_home')->nullable();

            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('instagram')->nullable();
            $table->text('youtube')->nullable();

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
        Schema::dropIfExists('shops');
    }
}
