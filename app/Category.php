<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        // use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'hall_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function categoryHalls()
    {
        return Halls::where('id', $this->hall_id)->first()->name;
    }
}
