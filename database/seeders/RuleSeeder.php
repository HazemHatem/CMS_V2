<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            ['name' => 'user'],
            ['name' => 'author'],
            ['name' => 'admin'],
            ['name' => 'manager'],
        ];
        Rule::insert($rules);
    }
}
