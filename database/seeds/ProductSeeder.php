<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ProductSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class,50)->create([
            'shop_id' => 1,
            'category_id' => 1
        ])->each(function($producto){
            $attr = factory(\App\Models\AttributeProduct::class)->create([
                'shop_id' => $producto->shop_id,
                'product_id' => $producto->id
            ]);

            $producto->attributes()->save($attr);
        });
    }
}
