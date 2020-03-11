<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'display',
        'phone',
        'tax_id'
    ];

    public function getDateAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function companyUser()
    {
        return $this->hasOne(CompanyUser::class, 'company_id');
    }
}
