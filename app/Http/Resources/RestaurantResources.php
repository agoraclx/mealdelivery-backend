<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResources extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'location'       => $this->location,
            'popularity'     => $this->popularity,
            'distance'       => $this->distance,
            'balance'        => $this->balance,
            'business_hours' => $this->business_hours,
            'menu_String'    => $this->menu,
            'menu'           => json_decode($this->menu),
            'total_dish'     => $this->total_dish,
            
        ];
    }
}
