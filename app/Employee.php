<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','address', 'phone', 'position'
    ];


    public function booking() {

        return $this->hasMany(Booking::class);

    }

    public function return() {

        return $this->hasMany(Retuns::class);

    }

    
}
