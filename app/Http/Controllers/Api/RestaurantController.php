<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RestaurantFilterController;
use App\Http\Resources\RestaurantResources;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RestaurantController extends Controller
{
    public function index(RestaurantFilterController $filter, Restaurant $restaurant, Request $request)
    {
        $arrRestaurant = $restaurant->filter($filter)->get();

        // sort data not exists in  database Mpdel append
        if($request->exists('distance'))
        {
            return RestaurantResources::collection($arrRestaurant->sortBy('distance'));
        }
        
        return RestaurantResources::collection($arrRestaurant);
    }
}
