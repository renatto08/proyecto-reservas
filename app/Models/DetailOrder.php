<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_orders';
    protected $guarded = ['id'];
    protected $fillable = ['order_id','product_id','attribute_id','q','price','price_sale','unit','gift'];

    //accesors
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function attribute(){
        return $this->belongsTo(AttributeProduct::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
