<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personalities')->insert([
            'name' => 'おっとり',
            'description' => 'おっとりした性格です。',
        ]);

        DB::table('personalities')->insert([
            'name' => 'かわいい系',
            'description' => 'かわいい系の性格です。',
        ]);

        DB::table('personalities')->insert([
            'name' => '天然',
            'description' => '天然系の性格です。',
        ]);

        DB::table('personalities')->insert([
            'name' => '甘えん坊',
            'description' => '甘えん坊な性格です。',
        ]);
    }
}
