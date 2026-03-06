<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('options')->insert([
            'name' => 'ローター',
            'price' => '1000',
            'description' => 'ローターを使用します。',
        ]);

        DB::table('options')->insert([
            'name' => 'コスプレ',
            'price' => '1000',
            'description' => 'コスプレを使用します。',
        ]);

        DB::table('options')->insert([
            'name' => 'パンスト',
            'price' => '1000',
            'description' => 'パンストを使用します。',
        ]);
    }
}
