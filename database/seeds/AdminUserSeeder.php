<?php

use App\Constants\UserLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $username = "123456";

        \App\User::forceCreate([
            "name" => "Admin",
            "nip" => $username,
            "password" => Hash::make($username),
            "level" => UserLevel::ADMIN,
        ]);
    }
}
