<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->getOutput()->progressStart(1000);
        $userJson = File::get("database/data/users.json");
        $data = json_decode($userJson, true);
        foreach ($data as $obj) {
            User::create([
                'name'           => $obj['name'],
                'location'       => $obj['location'],
                'balance'        => $obj['balance'],
                'purchases'      => json_encode($obj['purchases']),
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
