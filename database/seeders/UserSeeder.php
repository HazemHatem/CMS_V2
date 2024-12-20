<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "name" => "Ahmed",
            "email" => "Auhtor@email.com",
            "password" => "Aa@11111",
            "phone" => "01155991724",
            "rule_id" => 2
        ]);

        User::factory()->create([
            "name" => "Hazem Hatem",
            "email" => "hhazm6745@gmail.com",
            "password" => "Hazem@2005",
            "phone" => "01092492013",
            "rule_id" => 4
        ]);


        User::factory()->count(10)->create();

        User::factory()
            ->count(5)
            ->admin()
            ->create();

        User::factory()
            ->count(10)
            ->author()
            ->create();
    }
}
