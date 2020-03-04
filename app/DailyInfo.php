<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyInfo extends Model
{
    protected $fillable = [
        'status',
		'sun_text',
		'sun_time',
		'mon_text',
		'mon_time',
		'tues_text',
		'tues_time',
		'wedn_text',
		'wedn_time',
		'thurs_text',
		'thurs_time',
		'frid_text',
		'frid_time',
		'sut_text',
		'sut_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
