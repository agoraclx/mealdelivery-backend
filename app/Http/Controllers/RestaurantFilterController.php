<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use App\QueryFilter;
use Illuminate\Http\Request;
use Psy\Exception\Exception;

class RestaurantFilterController extends QueryFilter
{

    // List restaurants by popularity (by transaction volume, either by number of transactions or transaction amount)
    public function popular($order = 'desc')
    {
        return $this->builder->orderBy('popularity', $order);
    }

    // List all restaurants within the vicinity of the user’s location or (any location), ranked by distance
    // (the distances will be displayed in the app)
    // ==> move to main Api/RestaurantControllers

    // List all restaurants that are open at a certain time
    // public function test($query)
    // {
    //     return $this->builder->where('menu', "LIKE", '%'.$query.'%');
    // }

    // List all restaurants that are open for x-z hours per day or week
    

    // List all restaurants that have x-z number of dishes within a price range
    // public function price($price)
    // {
    //     return $this->builder
    //         ->where([
    //             ['menu', '<>', '%'.$price.'%'],
    //         ]);
    // }
    // public function price2($price)
    // {
    //     return $this->builder
    //     ->where([
    //         ['menu', '<>', '%'.$price.'%'],
    //     ]);
    // }

    /**
     * Search for restaurants or dishes by name, ranked by relevance to search term
     * Search for restaurants that has a dish matching search term
     *
     * @param [type] $name
     * @return void
     */
    public function query($name = '')
    {
        return $this->builder
            ->where('name', 'LIKE', '%'.$name.'%')
            ->orWhere('business_hours', "LIKE", '%'.$name.'%')
            ->orWhere('menu', "LIKE", '%'.$name.'%');
    }
}
