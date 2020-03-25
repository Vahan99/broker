<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerFilter extends Model
{
    protected $fillable = [
        'code',
        'type',
        'info',
        'link',
        'area',
        'price',
        'phone',
        'rooms',
        'street',
        'floors',
        'balcon',
        'proect',
        'region',
        'status',
        'user_id',
        'faceArea',
        'cosmetic',
        'lastFloor',
        'subRegion',
        'firstFloor',
        'gardenArea',
        'created_at',
        'updated_at',
        'realityType',
        'customerName',
        'buildingType',
        'buildingNumber',
        'buildingFloors',
        'apartamentNumber',
    ];
}
