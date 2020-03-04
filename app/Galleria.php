<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galleria extends Model
{
    protected $fillable = [
        'id','type','link','image','hall_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
