<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
class ecom_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
        "name"=>"Asgar",
        "email"=>"asg@gmail.com",
        "phone"=>"9087654321",
        "address"=>"amhara",
        "password"=>hash::make('asgar1234')
        ]);
    }
}
