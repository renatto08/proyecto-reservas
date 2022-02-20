<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class AttributeProduct extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'attribute_products';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['shop_id','product_id','sku','color_id','size_id','stock','alert_stock'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = ['queque','full_desc','product_title'];

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
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
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

    public function getProductTitleAttribute(){
        return $this->product->title;
    }

    public function getFullDescAttribute(){
        return $this->color->name."-".$this->size->size;
    }

    public function getQuequeAttribute(){

        $total = DetailOrder::whereHas("order",function($q){
            $q->where("shop_id",Session::get('shop_id'))
            ->where('status','Reserva');
        })->where('attribute_id',$this->id)->sum('q');
        return (int)$total;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
