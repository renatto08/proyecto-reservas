<?php

namespace App\Models;

use App\User;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'orders';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['shop_id','client_id','campaign_id','coupon_id','discount','discount_offer',
        'flete_address','flete','amount_discount','amount_discount_offer','user_id','status','sub_total','sub_total_offer','total',
        'payment','name_bank','amount_discount_aditional','description','flete_address_text'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function detalle(){
        return $this->hasMany(DetailOrder::class);
    }

    public function discount_model(){
        return $this->belongsTo(Coupon::class,'discount');
    }
    public function discount_offer_model(){
        return $this->belongsTo(Coupon::class,'discount_offer');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    public function getSerieAttribute(){
        $serie = $this->id;
        while (strlen($serie)<=5){
            $serie = "0".$serie;
        }
        return $serie;
    }

    public function getNameUserAttribute(){
        return $this->user->username."-".$this->client->full_name;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
