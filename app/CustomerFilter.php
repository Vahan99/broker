<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerFilter extends Model
{
    protected $fillable = [
        'buildingFloorsMin',
        'buildingFloorsMax',
        'floorMin',
        'floorMax',
        'areaMin',
        'areaMax',
        'roomsMin',
        'roomsMax',
        'priceMin',
        'priceMax',
        'gardenMin',
        'gardenMax',
        'facePartMin',
        'facePartMax',

        'type',
        'realityType',
        'proect',
        'buildingType',
        'cosmetic',
        'balcon',
        'region',
        'subRegion',
        'street',
        'buildingNumber',
        'apartamentNumber',
        'customerName',
        'status',
        'code',
        'firstFloor',
        'lastFloor',
        'customer_id',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region');
    }

    public function subRegion()
    {
        return $this->belongsTo(SubRegion::class, 'subRegion');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
