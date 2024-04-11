<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
            "name"=> "Eslam Badawy",
            "email"=> "eslam@user.com",
            "password"=> Hash::make("password"),
            "phone"=> "01150099801",
            "location" => "miniy",
            "group_id" => 1,
    ]);
    }
}
