<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'admin', 'phone', 'address', 'entry',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Admin()
    {
        return $this->admin;
    }

    public function companyUser()
    {
        return $this->hasOne(CompanyUser::class, 'user_id');
    }

    public function getDateAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function getCompany()
    {
        return $this->companyUser ? $this->companyUser->company : false;
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'admin_id');
    }

    public function hasCompanyDisplay()
    {
        return $this->getCompany() ? $this->getCompany()->display : $this->parent->companyUser->company->display;
    }

    public function brokers()
    {
        return $this->hasMany(self::class, 'admin_id')->whereAdmin(2);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }

    public function customersFilters()
    {
        dd(4848);
    }

    public function reality()
    {
        return $this->hasMany(Reality::class, 'user_id');
    }

    public function redirect()
    {
        return $this->Admin() == 1 ? 'admin/reality/reality-list' : $this->Admin() == 2 ? 'admin/reality/reality-list' : 'super/dashboard';
    }
}