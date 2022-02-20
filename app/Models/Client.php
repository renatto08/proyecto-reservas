<?php

namespace App\Models;

use App\User;
use App\Models\BackpackUser;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'clients';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['shop_id','user_id','first_name','last_name','birthdate','code','city','address','phone','request_lider','is_lider','is_empresaria','parent_id'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $appends = ['full_name'];

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

    public function parent()
    {
        return $this->belongsTo(Client::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function buser(){
        return $this->belongsTo(BackpackUser::class,'user_id','id');
    }

    public function campaign(){
        return $this->belongsTo(Campaign::class);
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

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function getNameUsernameAttribute(){
        return $this->user->username;
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
