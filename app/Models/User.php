<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{

    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'password',
        'email',
        'full_name',
        'phone_number',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function addresses(){
        return $this->hasMany(Addresses::class, 'user_id');
    }
}
