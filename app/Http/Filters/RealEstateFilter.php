<?php

namespace App\Http\Filters;
use App\Reality;
use Illuminate\Support\Facades\Auth;

class RealEstateFilter
{
    protected $r;

    public $filter;

    public function __construct($r)
    {
        $this->r = $r;
        $this->filter();
    }

    protected function filter()
    {
        $this->filter = new Reality;
        $this->filter = $this->filter->whereUserId(Auth::id());
        $this->filter->when($this->r['type'], function ($q){
            $this->filter = $q->whereType(intval($this->r['type']));
        });
        $this->filter->when($this->r['code'] && $this->r['code'] != null, function($q){
            $this->filter = $q->where('code', "LIKE", intval($this->r['code']).'%');
        });
        $this->filter->when($this->r['hp_code'] && $this->r['hp_code'] != null, function($q){
            $this->filter = $q->where("link", "LIKE", '%'.$this->r['hp_code'].'%');
        });
        $this->filter->when($this->r['realityType'] && $this->r['realityType'] != "-1", function($q){
            $this->filter = $q->whereRealityType(intval($this->r['realityType']));
        });
        $this->filter->when($this->r['realityProect'] && $this->r['realityProect'] != "-1", function($q){
            $this->filter = $q->whereProect(intval($this->r['realityProect']));
        });
        $this->filter->when($this->r['realityBuildingType'] && $this->r['realityBuildingType'] != "-1", function($q){
            $this->filter = $q->whereBuildingType(intval($this->r['realityBuildingType']));
        });
        $this->filter->when($this->r['realityCosmetic'] && $this->r['realityCosmetic'] != "-1", function($q){
            $this->filter = $q->whereCosmetic(intval($this->r['realityCosmetic']));
        });
        $this->filter->when($this->r['realityBalcon'] && $this->r['realityBalcon'] != "-1", function($q){
            $this->filter = $q->whereBalcon(intval($this->r['realityBalcon']));
        });
        $this->filter->when($this->r['realityReg'] && $this->r['realityReg'] != "-1" && $this->r['realitySubReg'] == null, function($q){
            $this->filter = $q->whereRegion(intval($this->r['realityReg']));
        });
        $this->filter->when($this->r['streetSearch'] && $this->r['streetSearch'] != null, function($q){
            $this->filter = $q->where("street", "LIKE","%".$this->r['streetSearch']."%");
        });
        $this->filter->when($this->r['buildingNumber'] && $this->r['buildingNumber'] != null, function($q){
            $this->filter = $q->whereBuildingNumber($this->r['buildingNumber']);
        });
        $this->filter->when($this->r['apartamentNumber'] && $this->r['apartamentNumber'] != null, function($q){
            $this->filter = $q->whereApartamentNumber(intval($this->r['apartamentNumber']));
        });
        $this->filter->when($this->r['floorMin'] && $this->r['floorMin'] != null, function($q){
            $this->filter = $q->where("floors", ">=",intval($this->r['floorMin']));
        });
        $this->filter->when($this->r['floorMax'] && $this->r['floorMax'] != null, function($q){
            $this->filter = $q->where("floors", "<=",intval($this->r['floorMax']));
        });
        $this->filter->when($this->r['firstFloor'] && $this->r['firstFloor'] == "1", function($q){
            $this->filter = $q->whereFirstFloor(intval($this->r['firstFloor']));
        });
        $this->filter->when($this->r['lastFloor'] && $this->r['lastFloor'] == "1", function($q){
            $this->filter = $q->whereLastFloor(intval($this->r['lastFloor']));
        });
        $this->filter->when($this->r['areaMin'] && $this->r['areaMin'] != null, function($q){
            $this->filter = $q->where("area", ">=",intval($this->r['areaMin']));
        });
        $this->filter->when($this->r['areaMax'] && $this->r['areaMax'] != null, function($q){
            $this->filter = $q->where("area", "<=",intval($this->r['areaMax']));
        });
        $this->filter->when($this->r['roomsMin'] && $this->r['roomsMin'] != null, function($q){
            $this->filter = $q->where("rooms", ">=",intval($this->r['roomsMin']));
        });
        $this->filter->when($this->r['roomsMax'] && $this->r['roomsMax'] != null, function($q){
            $this->filter = $q->where("rooms", "<=",intval($this->r['roomsMax']));
        });
        $this->filter->when($this->r['priceMin'] && $this->r['priceMin'] != null, function($q){
            $this->filter = $q->where("price", ">=",intval($this->r['priceMin']));
        });
        $this->filter->when($this->r['priceMax'] && $this->r['priceMax'] != null, function($q){
            $this->filter = $q->where("price", "<=",intval($this->r['priceMax']));
        });
        $this->filter->when($this->r['buildingFloorsMin'] && $this->r['buildingFloorsMin'] != null, function($q){
            $this->filter = $q->where("buildingFloors", ">=",intval($this->r['buildingFloorsMin']));
        });
        $this->filter->when($this->r['buildingFloorsMax'] && $this->r['buildingFloorsMax'] != null, function($q){
            $this->filter = $q->where("buildingFloors", "<=",intval($this->r['buildingFloorsMax']));
        });
        $this->filter->when($this->r['gardenMin'] && $this->r['gardenMin'] != null, function($q){
            $this->filter = $q->where("gardenArea", ">=",intval($this->r['gardenMin']));
        });
        $this->filter->when($this->r['gardenMax'] && $this->r['gardenMax'] != null, function($q){
            $this->filter = $q->where("gardenArea", "<=",intval($this->r['gardenMax']));
        });
        $this->filter->when($this->r['facePartMin'] && $this->r['facePartMin'] != null, function($q){
            $this->filter = $q->where("faceArea", ">=", intval($this->r['facePartMin']));
        });
        $this->filter->when($this->r['facePartMax'] && $this->r['facePartMax'] != null, function($q){
            $this->filter = $q->where("faceArea", "<=",intval($this->r['facePartMax']));
        });
        $this->filter->when($this->r['phone'] && $this->r['phone'] == null, function($q){
            $this->filter = $q->where("phone", "LIKE",'%'.$this->r['phone'].'%');
        });
        $this->filter->when($this->r['customerName'] && $this->r['customerName'] == null, function($q){
            $this->filter = $q->whereCustomerName($this->r['customerName']);
        });

        $this->filter->orderBy('code', 'desc')->orderBy('id', 'desc');
    }
}





