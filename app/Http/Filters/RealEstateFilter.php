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
        $this->filter->when(isset($this->r['type']), function ($q){
            $this->filter = $q->where('type', $this->r['type']);
        });
        $this->filter->when(isset($this->r['street']) && $this->r['street'] != null, function($q){
            $this->filter = $q->where("street", "LIKE","%".$this->r['street']."%");
        });
        $this->filter->when(isset($this->r['phone']) && $this->r['phone'] == null, function($q){
            $this->filter = $q->where("phone", "LIKE",'%'.$this->r['phone'].'%');
        });
        $this->filter->when(isset($this->r['code']) && $this->r['code'] != null, function($q){
            $this->filter = $q->where('code', "LIKE", '%'.$this->r['code'].'%');
        });
        $this->filter->when(isset($this->r['hp_code']) && $this->r['hp_code'] != null, function($q){
            $this->filter = $q->where("link", "LIKE", '%'.$this->r['hp_code'].'%');
        });
        $this->filter->when(isset($this->r['realityType']) && $this->r['realityType'] != "-1", function($q){
            $this->filter = $q->where('realityType', $this->r['realityType']);
        });
        $this->filter->when(isset($this->r['proect']) && $this->r['proect'] != "-1", function($q){
            $this->filter = $q->where('proect', $this->r['proect']);
        });
        $this->filter->when(isset($this->r['buildingType']) && $this->r['buildingType'] != "-1", function($q){
            $this->filter = $q->where('buildingType', $this->r['buildingType']);
        });
        $this->filter->when(isset($this->r['cosmetic']) && $this->r['cosmetic'] != "-1", function($q){
            $this->filter = $q->where('cosmetic', $this->r['cosmetic']);
        });
        $this->filter->when(isset($this->r['balcon']) && $this->r['balcon'] != "-1", function($q){
            $this->filter = $q->where('balcon', $this->r['balcon']);
        });
        $this->filter->when(isset($this->r['realityReg']), function($q){
            $this->filter = $q->where('region', $this->r['realityReg']);
        });
        $this->filter->when(isset($this->r['subRegions']) && !empty($this->r['subRegions']) && $this->r['subRegions'][0], function($q){
            $this->filter = $q->whereIn('subRegion', $this->r['subRegions']);
        });
        $this->filter->when(isset($this->r['buildingNumber']) && $this->r['buildingNumber'] != null, function($q){
            $this->filter = $q->where('buildingNumber', $this->r['buildingNumber']);
        });
        $this->filter->when(isset($this->r['apartamentNumber']) && $this->r['apartamentNumber'] != null, function($q){
            $this->filter = $q->where('apartamentNumber', $this->r['apartamentNumber']);
        });
        $this->filter->when(isset($this->r['floorMin'], $this->r['floorMin']), function($q){
            $this->filter = $q->whereBetween("floors", [$this->r['floorMin'], $this->r['floorMax']]);
        });
        $this->filter->when(isset($this->r['firstFloor']) && $this->r['firstFloor'] == "1", function($q){
            $this->filter = $q->where('firstFloor', $this->r['firstFloor']);
        });
        $this->filter->when(isset($this->r['lastFloor']) && $this->r['lastFloor'] == "1", function($q){
            $this->filter = $q->where('lastFloor', $this->r['lastFloor']);
        });
        $this->filter->when(isset($this->r['areaMax'], $this->r['areaMin']), function($q){
            $this->filter = $q->whereBetween("area", [$this->r['areaMin'], $this->r['areaMax']]);
        });
        $this->filter->when(isset($this->r['roomsMax'], $this->r['roomsMin']), function($q){
            $this->filter = $q->whereBetween("rooms", [$this->r['roomsMin'], $this->r['roomsMax']]);
        });
        $this->filter->when(isset($this->r['priceMax'], $this->r['priceMin']), function($q){
            $this->filter = $q->whereBetween("price", [$this->r['priceMin'], $this->r['priceMax']]);
        });
        $this->filter->when(isset($this->r['buildingFloorsMax'], $this->r['buildingFloorsMin']), function($q){
            $this->filter = $q->whereBetween("buildingFloors", [$this->r['buildingFloorsMin'], $this->r['buildingFloorsMax']]);
        });
        $this->filter->when(isset($this->r['gardenMax'], $this->r['gardenMin']), function($q){
            $this->filter = $q->whereBetween("gardenArea", [$this->r['gardenMin'], $this->r['gardenMax']]);
        });
        $this->filter->when(isset($this->r['facePartMax'], $this->r['facePartMin']), function($q){
            $this->filter = $q->whereBetween("faceArea", [$this->r['facePartMin'], $this->r['facePartMax']]);
        });
        $this->filter->when(isset($this->r['customerName']) && $this->r['customerName'] == null, function($q){
            $this->filter = $q->where('customerName', $this->r['customerName']);
        });

        $this->filter->orderBy('code', 'desc')->orderBy('id', 'desc');
    }
}





