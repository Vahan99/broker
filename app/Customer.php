<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Data\Customer as CustomerData;

class Customer extends Model
{
    /**
     * Buyers = Գնորդներ, Renter = Վարձակալ;
    */

    public $customerTypes = [
        'Buyers' => 0,
        'Renter' => 1,
    ];

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
        return $this->hasMany(CustomerFilter::class, 'customer_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }

    public function getAllPhonesAttribute()
    {
        return "{$this->first_phone}, {$this->last_phone}";
    }

    public function getTypeAttribute()
    {
        return (new CustomerData)->types()[$this->customer]['label'];
    }

}
