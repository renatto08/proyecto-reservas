<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class)->create(['name' => 'Admin',
            'username'=>'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123')]);

        DB::table('shops')->insert([
            'name' => 'Tienda A',
            'code' => 'fixzy',
            'address' => 'av 123',
            'email' => 'admin@admin.com',
            'phone' => '968728452',
            'theme' => 'default',
            'active' => true
        ]);

        DB::table('clients')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'birthdate' => '1990/09/19',
            'code' => '123',
            'city' => 'Lima',
            'address' => '123',
            'phone' => '123',
            'shop_id' => 1,
            'user_id' => 1
        ]);

        DB::table('colors')->insert([
            'shop_id' => 1,
            'name' => 'red',
            'color' => '#aaa'
        ]);

        DB::table('sizes')->insert([
            'shop_id' => 1,
           'size' => 'Small'
        ]);

        DB::table('categories')->insert([
           'shop_id' => 1,
            'name' => 'General',
            'active' => true
        ]);

        DB::table('campaigns')->insert([
           'shop_id' => 1,
           'name' => 'Octubre 2019',
            'active' => true
        ]);

        DB::table('shop_users')->insert([
            'shop_id'=>1,
            'user_id' => 1,
        ]);

        DB::table('coupons')->insert([
            'shop_id' => 1,'title' => 'cupon oferta','code' => 'a' , 'type' =>'monto','type_coupon'=>'Ofertas',
            'value' => 55,'value_min'=>1,'expirated' => \Carbon\Carbon::createFromDate(2020,12,12),'active' => true
        ]);
        DB::table('coupons')->insert([
            'shop_id' => 1,'title' => 'cupon oferta','code' => 'b' , 'type' =>'monto','type_coupon'=>'Tienda',
            'value' => 55,'value_min'=>1,'expirated' => \Carbon\Carbon::createFromDate(2020,12,12),'active' => true
        ]);

        $this->call(ProductSeeder::class);
    }
}
