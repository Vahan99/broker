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
        $this->filter->when($this->r['type'] != 'all' && isset($this->r['type']), function ($q){
            $this->filter = $q->where('type', $this->r['type']);
        });
        $this->filter->when($this->r['street'] != 'all' && isset($this->r['street']) && $this->r['street'] != null, function($q){
            $this->filter = $q->where("street", "LIKE","%".$this->r['street']."%");
        });
        $this->filter->when($this->r['phone'] != 'all' && isset($this->r['phone']), function($q){
            $this->filter = $q->where("phone", "LIKE",'%'.$this->r['phone'].'%');
        });
        $this->filter->when($this->r['code'] != 'all' && isset($this->r['code']) && $this->r['code'] != null, function($q){
            $this->filter = $q->where('code', "LIKE", '%'.$this->r['code'].'%');
        });
        $this->filter->when($this->r['hp_code'] != 'all' && isset($this->r['hp_code']) && $this->r['hp_code'], function($q){
            $this->filter = $q->where("link", "LIKE", '%'.$this->r['hp_code'].'%');
        });
        $this->filter->when($this->r['realityType'] != 'all' && isset($this->r['realityType']) && $this->r['realityType'] != "-1", function($q){
            $this->filter = $q->where('realityType', $this->r['realityType']);
        });
        $this->filter->when($this->r['proect'] != 'all' && isset($this->r['proect']) && $this->r['proect'] != "-1", function($q){
            $this->filter = $q->where('proect', $this->r['proect']);
        });
        $this->filter->when($this->r['buildingType'] != 'all' && isset($this->r['buildingType']) && $this->r['buildingType'] != "-1", function($q){
            $this->filter = $q->where('buildingType', $this->r['buildingType']);
        });
        $this->filter->when($this->r['cosmetic'] != 'all' && isset($this->r['cosmetic']) && $this->r['cosmetic'] != "-1", function($q){
            $this->filter = $q->where('cosmetic', $this->r['cosmetic']);
        });
        $this->filter->when($this->r['balcon'] != 'all' && isset($this->r['balcon']) && $this->r['balcon'] != "-1", function($q){
            $this->filter = $q->where('balcon', $this->r['balcon']);
        });
        $this->filter->when($this->r['realityReg'] != 'all' && isset($this->r['realityReg']), function($q){
            $this->filter = $q->where('region', $this->r['realityReg']);
        });
        $this->filter->when($this->r['subRegions'] != 'all' && isset($this->r['subRegions']) && !empty($this->r['subRegions']) && $this->r['subRegions'][0], function($q){
            $this->filter = $q->whereIn('subRegion', $this->r['subRegions']);
        });
        $this->filter->when($this->r['buildingNumber'] != 'all' && isset($this->r['buildingNumber']) && $this->r['buildingNumber'] != null, function($q){
            $this->filter = $q->where('buildingNumber', $this->r['buildingNumber']);
        });
        $this->filter->when($this->r['apartamentNumber'] != 'all' && isset($this->r['apartamentNumber']) && $this->r['apartamentNumber'] != null, function($q){
            $this->filter = $q->where('apartamentNumber', $this->r['apartamentNumber']);
        });
        $this->filter->when($this->r['floorMin'] != 'all' && isset($this->r['floorMin']) || isset($this->r['floorMax']), function($q){
            if($this->r['floorMin'] && $this->r['floorMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['floorMin'], $this->r['floorMax']]);
            } else if($this->r['floorMin']){
                $this->filter = $q->where("floors", $this->r['floorMin']);
            }else if ($this->r['floorMax']){
                $this->filter = $q->where("floors", $this->r['floorMax']);
            }
        });
        $this->filter->when($this->r['firstFloor'] != 'all' && isset($this->r['firstFloor']) && $this->r['firstFloor'] === 'true', function($q){
            $this->filter = $q->where('firstFloor', $this->r['firstFloor']);
        });
        $this->filter->when($this->r['lastFloor'] != 'all' && isset($this->r['lastFloor']) && $this->r['lastFloor'] === 'true', function($q){
            $this->filter = $q->where('lastFloor', $this->r['lastFloor']);
        });
        $this->filter->when($this->r['areaMin'] != 'all' && isset($this->r['areaMin']) || isset($this->r['areaMax']), function($q){
            if($this->r['areaMin'] && $this->r['areaMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['areaMin'], $this->r['areaMax']]);
            } else if($this->r['areaMin']){
                $this->filter = $q->where("floors", $this->r['areaMin']);
            }else if ($this->r['areaMax']){
                $this->filter = $q->where("floors", $this->r['areaMax']);
            }
        });
        $this->filter->when($this->r['roomsMin'] != 'all' && isset($this->r['roomsMin']) || isset($this->r['roomsMax']), function($q){
            if($this->r['roomsMin'] && $this->r['roomsMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['roomsMin'], $this->r['roomsMax']]);
            } else if($this->r['roomsMin']){
                $this->filter = $q->where("floors", $this->r['roomsMin']);
            }else if ($this->r['roomsMax']){
                $this->filter = $q->where("floors", $this->r['roomsMax']);
            }
        });
        $this->filter->when($this->r['priceMin'] != 'all' && isset($this->r['priceMin']) || isset($this->r['priceMax']), function($q){
            if($this->r['priceMin'] && $this->r['priceMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['priceMin'], $this->r['priceMax']]);
            } else if($this->r['priceMin']){
                $this->filter = $q->where("floors", $this->r['priceMin']);
            }else if ($this->r['priceMax']){
                $this->filter = $q->where("floors", $this->r['priceMax']);
            }
        });
        $this->filter->when($this->r['buildingFloorsMin'] != 'all' && isset($this->r['buildingFloorsMin']) || isset($this->r['buildingFloorsMax']), function($q){
            if($this->r['buildingFloorsMin'] && $this->r['buildingFloorsMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['buildingFloorsMin'], $this->r['buildingFloorsMax']]);
            } else if($this->r['buildingFloorsMin']){
                $this->filter = $q->where("floors", $this->r['buildingFloorsMin']);
            }else if ($this->r['buildingFloorsMax']){
                $this->filter = $q->where("floors", $this->r['buildingFloorsMax']);
            }
        });
        $this->filter->when($this->r['gardenMin'] != 'all' && isset($this->r['gardenMin']) || isset($this->r['gardenMax']), function($q){
            if($this->r['gardenMin'] && $this->r['gardenMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['gardenMin'], $this->r['gardenMax']]);
            } else if($this->r['gardenMin']){
                $this->filter = $q->where("floors", $this->r['gardenMin']);
            }else if ($this->r['gardenMax']){
                $this->filter = $q->where("floors", $this->r['gardenMax']);
            }
        });
        $this->filter->when($this->r['facePartMin'] != 'all' && isset($this->r['facePartMin']) || isset($this->r['facePartMax']), function($q){
            if($this->r['facePartMin'] && $this->r['facePartMax']){
                $this->filter = $q->whereBetween("floors", [$this->r['facePartMin'], $this->r['facePartMax']]);
            } else if($this->r['facePartMin']){
                $this->filter = $q->where("floors", $this->r['facePartMin']);
            }else if ($this->r['facePartMax']){
                $this->filter = $q->where("floors", $this->r['facePartMax']);
            }
        });
        $this->filter->when($this->r['customerName'] != 'all' && isset($this->r['customerName']) && $this->r['customerName'] == null, function($q){
            $this->filter = $q->where('customerName', $this->r['customerName']);
        });
        $this->filter->orderBy('code', 'desc')->orderBy('id', 'desc');
    }
}





