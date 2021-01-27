<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RestaurantFilterController;
use App\Http\Resources\RestaurantResources;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RestaurantController extends Controller
{
    public function index(RestaurantFilterController $filter, Restaurant $restaurant, Request $request)
    {
        $arrRestaurant = $restaurant->filter($filter)->get();

        // sort data not exists in database (append)
        if($request->exists('distance'))
        {
            return RestaurantResources::collection($arrRestaurant->sortBy('distance'));
        }
        
        return RestaurantResources::collection($arrRestaurant);
    }

    public function user()
    {
        $users = User::get();

        foreach($users as $user)
        {
            // dump($user); //["restaurant_name"]
            // dump(count(json_decode($user['purchases'])));
            $purchases = $user['purchases'];
            foreach($purchases as $purchase)
            {
                dump(count($user['purchases'])); //["restaurant_name"]
            }
            
        }
        // $users->get();
        dd(123);
        return $users;
    }
}
