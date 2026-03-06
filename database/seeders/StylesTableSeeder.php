<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('styles')->insert([
            'name' => 'スレンダー',
            'description' => 'スレンダーな体型のキャストです。',
        ]);

        DB::table('styles')->insert([
            'name' => 'ぽっちゃり',
            'description' => 'ぽっちゃりした体型のキャストです。',
        ]);

        DB::table('styles')->insert([
            'name' => '巨乳',
            'description' => '巨乳な体型のキャストです。',
        ]);
    }
}
