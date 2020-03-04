<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
        // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','address','phone1','phone2','phone3','latit','longit','hall_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
