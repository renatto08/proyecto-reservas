<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Product::class,function(Faker $faker){
   return [
       'title' => $faker->text(30),
       'description' => $faker->sentence,
       'price' => $faker->randomFloat(2,0,150),
       'price_sale' => 0,
       'stock' => 0,
       'new' => $faker->randomElement([true,false]),
       'active' => true
   ];
});

$factory->define(\App\Models\AttributeProduct::class,function(Faker $faker){
   return [
       'sku' =>  $faker->randomNumber(5),
       'color_id' => 1,
       'size_id' => 1,
       'stock' => 0,
       'alert_stock' => 0
   ] ;
});