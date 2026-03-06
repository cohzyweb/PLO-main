<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop_user')->insert([
            'user_id' => 2,
            'shop_id' => 1,
        ]);

        DB::table('shop_user')->insert([
            'user_id' => 3,
            'shop_id' => 2,
        ]);

        DB::table('shop_user')->insert([
            'user_id' => 4,
            'shop_id' => 3,
        ]);

        DB::table('shop_user')->insert([
            'user_id' => 5,
            'shop_id' => 4,
        ]);

        DB::table('shop_user')->insert([
            'user_id' => 6,
            'shop_id' => 5,
        ]);

        DB::table('shop_user')->insert([
            'user_id' => 7,
            'shop_id' => 6,
        ]);

        DB::table('shop_user')->insert([
            'user_id' => 8,
            'shop_id' => 7,
        ]);
    }
}
