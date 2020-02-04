<?php

use App\Constants\UserLevel;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Administrator",
            "username" => "admin",
            "level" => UserLevel::ADMIN,
            "password" => Hash::make("password"),
        ]);
    }
}
