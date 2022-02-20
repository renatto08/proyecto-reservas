<?php

namespace App;

use App\Models\Client;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this
    protected $guard_name = 'backpack';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function client(){
        return $this->hasOne(Client::class);
    }

    public function getIsStaffAttribute(){
        return backpack_user()->hasRole('staff');
    }


    public function scopeLider($query){
        //return $query->whereHas('')
    }

}
