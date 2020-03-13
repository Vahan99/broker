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
            $this->filter = $q->where('type', intval($this->r['type']));
        });
        $this->filter->when(isset($this->r['code']) && $this->r['code'] != null, function($q){
            $this->filter = $q->where('code', "LIKE", intval($this->r['code']).'%');
        });
        $this->filter->when(isset($this->r['hp_code']) && $this->r['hp_code'] != null, function($q){
            $this->filter = $q->where("link", "LIKE", '%'.$this->r['hp_code'].'%');
        });
        $this->filter->when(isset($this->r['realityType']) && $this->r['realityType'] != "-1", function($q){
            $this->filter = $q->where('realityType', intval($this->r['realityType']));
        });
        $this->filter->when(isset($this->r['proect']) && $this->r['proect'] != "-1", function($q){
            $this->filter = $q->where('proect', intval($this->r['proect']));
        });
        $this->filter->when(isset($this->r['buildingType']) && $this->r['buildingType'] != "-1", function($q){
            $this->filter = $q->where('buildingType', intval($this->r['buildingType']));
        });
        $this->filter->when(isset($this->r['cosmetic']) && $this->r['cosmetic'] != "-1", function($q){
            $this->filter = $q->where('cosmetic', intval($this->r['cosmetic']));
        });
        $this->filter->when(isset($this->r['balcon']) && $this->r['balcon'] != "-1", function($q){
            $this->filter = $q->where('balcon', intval($this->r['balcon']));
        });
        $this->filter->when(isset($this->r['realityReg']) && $this->r['realityReg'] != "-1" && $this->r['realitySubReg'] == null, function($q){
            $this->filter = $q->whereRegion(intval($this->r['realityReg']));
        });
        $this->filter->when(isset($this->r['street']) && $this->r['street'] != null, function($q){
            $this->filter = $q->where("street", "LIKE","%".$this->r['street']."%");
        });
        $this->filter->when(isset($this->r['buildingNumber']) && $this->r['buildingNumber'] != null, function($q){
            $this->filter = $q->where('buildingNumber', $this->r['buildingNumber']);
        });
        $this->filter->when(isset($this->r['apartamentNumber']) && $this->r['apartamentNumber'] != null, function($q){
            $this->filter = $q->where('apartamentNumber', intval($this->r['apartamentNumber']));
        });
        $this->filter->when(isset($this->r['floorMin'], $this->r['floorMin']), function($q){
            $this->filter = $q->whereBetween("floors", [intval($this->r['floorMin']), intval($this->r['floorMax'])]);
        });
        $this->filter->when(isset($this->r['firstFloor']) && $this->r['firstFloor'] == "1", function($q){
            $this->filter = $q->where('firstFloor', intval($this->r['firstFloor']));
        });
        $this->filter->when(isset($this->r['lastFloor']) && $this->r['lastFloor'] == "1", function($q){
            $this->filter = $q->where('lastFloor', intval($this->r['lastFloor']));
        });
        $this->filter->when(isset($this->r['areaMax'], $this->r['areaMin']), function($q){
            $this->filter = $q->whereBetween("area", [intval($this->r['areaMin']), intval($this->r['areaMax'])]);
        });
        $this->filter->when(isset($this->r['roomsMax'], $this->r['roomsMin']), function($q){
            $this->filter = $q->whereBetween("rooms", [intval($this->r['roomsMin']), intval($this->r['roomsMax'])]);
        });
        $this->filter->when(isset($this->r['priceMax'], $this->r['priceMin']), function($q){
            $this->filter = $q->whereBetween("price", [intval($this->r['priceMin']), intval($this->r['priceMax'])]);
        });
        $this->filter->when(isset($this->r['buildingFloorsMax'], $this->r['buildingFloorsMin']), function($q){
            $this->filter = $q->whereBetween("buildingFloors", [intval($this->r['buildingFloorsMin']), intval($this->r['buildingFloorsMax'])]);
        });
        $this->filter->when(isset($this->r['gardenMax'], $this->r['gardenMin']), function($q){
            $this->filter = $q->whereBetween("gardenArea", [intval($this->r['gardenMin']), intval($this->r['gardenMax'])]);
        });
        $this->filter->when(isset($this->r['facePartMax'], $this->r['facePartMin']), function($q){
            $this->filter = $q->whereBetween("faceArea", [intval($this->r['facePartMin']), intval($this->r['facePartMax'])]);
        });
        $this->filter->when(isset($this->r['phone']) && $this->r['phone'] == null, function($q){
            $this->filter = $q->where("phone", "LIKE",'%'.$this->r['phone'].'%');
        });
        $this->filter->when(isset($this->r['customerName']) && $this->r['customerName'] == null, function($q){
            $this->filter = $q->where('customerName', $this->r['customerName']);
        });

        $this->filter->orderBy('code', 'desc')->orderBy('id', 'desc');
    }
}





