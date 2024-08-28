<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "name"  =>  "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password")
        ];

        \App\Models\Admin::insert($data);
    }
}
