<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OrdenSalida extends Model
{
    protected $table = 'change_products';
    protected $fillable = ['shop_id','campaign_id','user_id','order_id','serie'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function getSerieAttribute(){
        $serie = $this->id;
        while (strlen($serie)<=5){
            $serie = "0".$serie;
        }
        return $serie;
    }

    public function detalle(){
        return $this->hasOne(OrdenSalidaDetalle::class,'cambio_producto_id','id');
    }
}
