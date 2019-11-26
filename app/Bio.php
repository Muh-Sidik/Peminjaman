<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $fillable = [
        'address', 'phone', 'position','user_id'
    ];
    protected $primaryKey = 'bio_id';

    
    public function user() {
    
        return $this->belongsTo(User::class, 'user_id');
    
    }
}
