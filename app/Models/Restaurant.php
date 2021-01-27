<?php

namespace App\Models;

use App\Http\Controllers\RestaurantFilterController;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $casts = [
        'menu' => 'array'
     ];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'balance',
        'business_hours',
        'menu',
    ];

    protected $appends = [
        'distance',
        'total_dish'
    ];

    public function scopeFilter($query, RestaurantFilterController $filter)
    {
        return $filter->apply($query);
    }

    public function getDistanceAttribute()
    {
        return round($this->distanceGeoPoints($this->location), 1);
    }

    public function getTotalDishAttribute()
    {
        return count(json_decode($this->menu));
    }

    /**
     * calculate point in KM
     * https://gist.github.com/gajus/5487925
     *
     * @param [type] $location
     * @return void
     */
    public function distanceGeoPoints($location)
    {
        $points = explode(",", $location);
    
        $long1 = "-8.640233";
        $lat1  = "115.228221";
        $long2 = $points[0];
        $lat2  = $points[1];
        $lat   = deg2rad($lat2 - $lat1);
        $long  = deg2rad($long2 - $long1);
        $a     = sin($lat/2) * sin($lat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($long/2) * sin($long/2);
        $c     = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d     = 6371 * $c;
              
        return $d;
    }
}
