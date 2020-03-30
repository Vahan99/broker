<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'surname',
        'customer',
        'first_phone',
        'last_phone',
    ];

    public function filters()
    {
        return $this->belongsTo(CustomerFilter::class, 'customer_id');
    }
}
