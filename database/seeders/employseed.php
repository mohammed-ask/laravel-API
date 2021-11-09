<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\employ;
use Faker\Factory as Faker;

class employseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create = Faker::create();
        foreach(range(1,100) as $loop){
        Employ::create([
            "name"=>$create->name,
            "address"=>$create->address,
            "phone"=>$create->phoneNumber,
            "country"=>$create->country,
        ]);
    }
    }
}
