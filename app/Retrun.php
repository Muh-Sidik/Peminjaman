<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retrun extends Model
{
    protected $fillable = [
        'type', 'amount', 'date', 'client_id', 'employee_id', 'booking_code'
    ];
    use SoftDeletes;
    protected $dates = ['delete_at'];
    protected $primaryKey = 'payment_id';
    protected $table = 'payments';

    public function employee() {

        return $this->belongsTo(Employee::class, 'employee_id');
    
    }

    public function client() {

        return $this->belongsTo(Client::class, 'client_id');
    
    }
}
