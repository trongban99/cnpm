<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'User_acount','User_password','User_name','Date_of_birth','User_sex','User_address','User_email',
        'User_folk','User_phone','User_image'
    ];
    protected $primaryKey ='User_id';
    protected $table ='Users';

    public function roles(){
        return $this->belongsToMany(Roles::class);
    }
    public function getAuthPassword(){
        return $this->User_password;
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }
    public function hasRole($role){
        return null !== $this->roles()->where('name',$role)->first();
    }

}

