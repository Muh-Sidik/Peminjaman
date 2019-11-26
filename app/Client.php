<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $fillable = [
        'name', 'no_member', 'dob', 'phone', 'address', 'gender'
    ];
    protected $primaryKey = 'client_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function booking() {

        return $this->hasMany(Booking::class);

    }

    public function return() {

        return $this->hasMany(Retuns::class);

    }
}
