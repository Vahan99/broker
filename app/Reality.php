<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\DeclareDeclare;

class Reality extends Model
{
    protected $table = 'reality';

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
