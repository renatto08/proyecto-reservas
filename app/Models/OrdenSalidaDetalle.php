<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenSalidaDetalle extends Model
{
    protected $table = 'change_product_details';
    public $timestamps = false;
    protected $fillable = ['cambio_producto_id','product_change_id','product_change_q','product_deliver_id','product_deliver_q'];

    public function product_change(){
        return $this->belongsTo(AttributeProduct::class,'product_change_id');
    }

    public function product_deliver(){
        return $this->belongsTo(AttributeProduct::class,'product_deliver_id');
    }
}
