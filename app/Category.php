<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable = [
        'category_name'
    ];
    protected $primaryKey = 'category_id';
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function item() {

        return $this->hasMany(Item::class);

    }
}
