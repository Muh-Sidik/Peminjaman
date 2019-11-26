<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    protected $fillable = [
        'booking_code', 'order_date', 'duration', 'price', 'status', 
        'return_date_supposed', 'return_date', 'fine', 'employee_id',
        'client_id', 'item_id'
    ];
    protected $primaryKey = 'booking_id';
    use SoftDeletes;
    protected $dates = ['delete_at'];



    public function employee() {

        return $this->belongsTo(Employee::class, 'employee_id');
    
    }

    public function client() {

        return $this->belongsTo(Client::class, 'client_id');
    
    }

    public function item() {
        
        return $this->belongsTo(Item::class, 'item_id');
    
    }

}
