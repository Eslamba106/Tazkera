<?php

namespace Database\Seeders;

use App\Models\Support_Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupportTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Support_Team::create([
            "name"=> "Eslam Badawy",
            "email"=> "badawy@team.com",
            "password"=> Hash::make("password"),
    ]);
    }
}
