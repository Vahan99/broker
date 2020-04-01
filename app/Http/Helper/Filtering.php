<?php

namespace App\Http\Helper;
use App\Reality;
use Illuminate\Support\Facades\Auth;

class Filtering
{
    protected $r;

    public $filter;

    public function __construct($r, $model)
    {
        $this->r = $r;
        $this->filter($model);
    }

    protected function filter($model)
    {
        $this->filter = $model;
        $this->filter->when(!Auth::user()->parent, function ($q){
            $brokers = Auth::user()->brokers()->pluck('id')->toArray();
            $this->filter = $q->whereIn('user_id', $brokers);
        }, function ($q){
            $this->filter = $q->whereUserId(Auth::id());
        });
        $this->filter->when(isset($this->r['broker']) && $this->r['broker'] !== 'all' && isset($this->r['broker']), function ($q){
            $this->filter = $q->where('user_id', $this->r['broker']);
        });
        $this->filter->when(isset($this->r['type']) && $this->r['type'] !== 'all' && isset($this->r['type']), function ($q){
            $this->filter = $q->where('type', $this->r['type']);
        });
        $this->filter->when(isset($this->r['street']) && $this->r['street'] !== 'all' && isset($this->r['street']) && $this->r['street'] != null, function($q){
            $this->filter = $q->where("street", "LIKE","%".$this->r['street']."%");
        });
        $this->filter->when(isset($this->r['phone']) && $this->r['phone'] !== 'all' && isset($this->r['phone']), function($q){
            $this->filter = $q->where("phone", "LIKE",'%'.$this->r['phone'].'%');
        });
        $this->filter->when(isset($this->r['code']) && $this->r['code'] !== 'all' && isset($this->r['code']) && $this->r['code'] != null, function($q){
            $this->filter = $q->where('code', "LIKE", '%'.$this->r['code'].'%');
        });
        $this->filter->when(isset($this->r['hp_code']) && $this->r['hp_code'] !== 'all' && isset($this->r['hp_code']) && $this->r['hp_code'], function($q){
            $this->filter = $q->where("link", "LIKE", '%'.$this->r['hp_code'].'%');
        });
        $this->filter->when(isset($this->r['realityType']) && $this->r['realityType'] !== 'all' && $this->r['realityType'] != "-1", function($q){
            $this->filter = $q->where('realityType', $this->r['realityType']);
        });
        $this->filter->when(isset($this->r['proect']) && $this->r['proect'] !== 'all' && isset($this->r['proect']) && $this->r['proect'] != "-1", function($q){
            $this->filter = $q->where('proect', $this->r['proect']);
        });
        $this->filter->when(isset($this->r['buildingType']) && $this->r['buildingType'] !== 'all' && isset($this->r['buildingType']) && $this->r['buildingType'] != "-1", function($q){
            $this->filter = $q->where('buildingType', $this->r['buildingType']);
        });
        $this->filter->when(isset($this->r['cosmetic']) && $this->r['cosmetic'] !== 'all' && isset($this->r['cosmetic']) && $this->r['cosmetic'] != "-1", function($q){
            $this->filter = $q->where('cosmetic', $this->r['cosmetic']);
        });
        $this->filter->when(isset($this->r['balcon']) && $this->r['balcon'] !== 'all' && isset($this->r['balcon']) && $this->r['balcon'] != "-1", function($q){
            $this->filter = $q->where('balcon', $this->r['balcon']);
        });
        $this->filter->when(isset($this->r['realityReg']) && $this->r['realityReg'] !== 'all' && isset($this->r['realityReg']), function($q){
            $this->filter = $q->where('region', $this->r['realityReg']);
        });
        $this->filter->when(isset($this->r['subRegions']) && $this->r['subRegions'] !== 'all' && isset($this->r['subRegions']) && !empty($this->r['subRegions']) && $this->r['subRegions'][0], function($q){
            $this->filter = $q->whereIn('subRegion', $this->r['subRegions']);
        });
        $this->filter->when(isset($this->r['buildingNumber']) && $this->r['buildingNumber'] !== 'all' && isset($this->r['buildingNumber']) && $this->r['buildingNumber'] != null, function($q){
            $this->filter = $q->where('buildingNumber', $this->r['buildingNumber']);
        });
        $this->filter->when(isset($this->r['apartamentNumber']) && $this->r['apartamentNumber'] !== 'all' && isset($this->r['apartamentNumber']) && $this->r['apartamentNumber'] != null, function($q){
            $this->filter = $q->where('apartamentNumber', $this->r['apartamentNumber']);
        });
        $this->filter->when(isset($this->r['floorMin']) && $this->r['floorMin'] !== 'all' && isset($this->r['floorMin']) || isset($this->r['floorMax']), function($q){
            $this->between('floors', $q, $this->r['floorMin'], $this->r['floorMax']);
        });
        $this->filter->when(isset($this->r['firstFloor']) && $this->r['firstFloor'] !== 'all' && isset($this->r['firstFloor']) && $this->r['firstFloor'] === 'true', function($q){
            $this->filter = $q->where('firstFloor', $this->r['firstFloor']);
        });
        $this->filter->when(isset($this->r['lastFloor']) && $this->r['lastFloor'] !== 'all' && isset($this->r['lastFloor']) && $this->r['lastFloor'] === 'true', function($q){
            $this->filter = $q->where('lastFloor', $this->r['lastFloor']);
        });
        $this->filter->when(isset($this->r['areaMin']) && $this->r['areaMin'] !== 'all' && isset($this->r['areaMin']) || isset($this->r['areaMax']), function($q){
            $this->between('area', $q, $this->r['areaMin'], $this->r['areaMax']);
        });
        $this->filter->when(isset($this->r['roomsMin']) && $this->r['roomsMin'] !== 'all' && isset($this->r['roomsMin']) || isset($this->r['roomsMax']), function($q){
            $this->between('rooms', $q, $this->r['roomsMin'], $this->r['roomsMax']);
        });
        $this->filter->when(isset($this->r['priceMin']) && $this->r['priceMin'] !== 'all' && isset($this->r['priceMin']) || isset($this->r['priceMax']), function($q){
            $this->between('price', $q, $this->r['priceMin'], $this->r['priceMax']);
        });
        $this->filter->when(isset($this->r['buildingFloorsMin']) && $this->r['buildingFloorsMin'] !== 'all' && isset($this->r['buildingFloorsMin']) || isset($this->r['buildingFloorsMax']), function($q){
            $this->between('buildingFloors', $q, $this->r['buildingFloorsMin'], $this->r['buildingFloorsMax']);
        });
        $this->filter->when(isset($this->r['gardenMin']) && $this->r['gardenMin'] !== 'all' && isset($this->r['gardenMin']) || isset($this->r['gardenMax']), function($q){
            $this->between('gardenArea', $q, $this->r['gardenMin'], $this->r['gardenMax']);
        });
        $this->filter->when(isset($this->r['facePartMin']) && $this->r['facePartMin'] !== 'all' && isset($this->r['facePartMin']) || isset($this->r['facePartMax']), function($q){
            $this->between('faceArea', $q, $this->r['facePartMin'], $this->r['facePartMax']);
        });
        $this->filter->when(isset($this->r['customerName']) && $this->r['customerName'] !== 'all' && isset($this->r['customerName']) && $this->r['customerName'] == null, function($q){
            $this->filter = $q->where('customerName', $this->r['customerName']);
        });

        /**
         * Customers Filter
         * */

        $this->filter->when(isset($this->r['customer']) && $this->r['customer'] !== 'all' && isset($this->r['customer']), function($q){
            $this->filter = $q->where('customer', $this->r['customer']);
        });

        $this->filter->when(isset($this->r['search']) && $this->r['search'] !== 'all' && isset($this->r['search']), function($q){
            $request = "%".$this->r['search']."%";
            $this->filter = $q->where('email', 'LIKE', $request)
                ->orWhere('name', 'LIKE', $request)
                ->orWhere('surname', 'LIKE', $request)
                ->orWhere('last_phone', 'LIKE', $request)
                ->orWhere('first_phone', 'LIKE', $request);
        });

        /**
         * Customers Filter
         * */

        $this->filter->orderBy('id', 'desc');
    }

    protected function between($column, $q, $min = null, $max = null)
    {
        if($min && $max){
            $this->filter = $q->whereBetween($column, [$min, $max]);
        } else if($min){
            $this->filter = $q->where($column, ">=", $min);
        }else if ($max){
            $this->filter = $q->whereBetween($column, [1, $max]);
        }
    }
}





