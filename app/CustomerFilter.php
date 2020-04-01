<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Data\Realty;

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

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function getNameAttribute()
    {
        return (new Realty)->types()[$this->realityType]['label'];
    }

    public function getRegionNameAttribute()
    {
        if ($this->region) {
            return $this->getRegion->name;

        }
    }

    public function getSubRegionNameAttribute()
    {
        if($this->subRegion){
            return $this->getSubRegion->name;
        }
    }

    public function getRegion()
    {
        return $this->belongsTo(Region::class, 'region');
    }

    public function getSubRegion()
    {
        return $this->belongsTo(SubRegion::class, 'subRegion');
    }
}
