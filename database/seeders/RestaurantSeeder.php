<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantJson = File::get("database/data/restaurants.json");
        $data = json_decode($restaurantJson, true);
        $this->command->getOutput()->progressStart(2202);
        foreach ($data as $obj) {
            Restaurant::create([
                'name'           => $obj['name'],
                'location'       => $obj['location'],
                'popularity'     => rand(1, 20),
                'balance'        => $obj['balance'],
                'business_hours' => $obj['business_hours'],
                'menu'           => json_encode($obj['menu']),
            ]);

            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
