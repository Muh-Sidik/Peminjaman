<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    protected $fillable = [
        'item_name', 'price', 'amount', 'category_id'
    ];
    protected $primaryKey = 'item_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function category() {

        return $this->belongsTo(Category::class, 'category_id');

    }

    public function booking() {

        return $this->hasMany(Booking::class);

    }
}
