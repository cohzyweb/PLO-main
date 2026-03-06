<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            'id' => 1,
            'slug' => 'touchvip',
            // 'url' => 'https://touch-vip.com',
            'url' => 'https://touchvip-test.com',
            'name' => 'タッチVIP',
            'postcode' => '064-0805',
            'address1' => '札幌市中央区南5西5丁目5-2',
            'address2' => 'T2ビル2F',
            'tel' => '011-512-4150',
            'email' => 'touchvip@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);

        DB::table('shops')->insert([
            'id' => 2,
            'slug' => 'shizuku',
            'url' => '/shizuku/',
            'name' => '雫',
            'postcode' => '064-0806',
            'address1' => '北海道札幌市中央区南6条西5丁目1-1',
            'address2' => '',
            'tel' => '011-533-8988',
            'email' => 'shizuku@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);

        DB::table('shops')->insert([
            'id' => 3,
            'slug' => 'miyabi',
            'url' => '/miyabi/',
            'name' => '雅',
            'postcode' => '064-0806',
            'address1' => '北海道札幌市中央区南6条西5丁目13-2',
            'address2' => '第1旭観光ビル3階',
            'tel' => '011-511-0930',
            'email' => 'miyabi@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);

        DB::table('shops')->insert([
            'id' => 4,
            'slug' => 'pussycat',
            'url' => '/pussycat/',
            'name' => 'プッシーキャット',
            'postcode' => '064-0806',
            'address1' => '北海道札幌市中央区南6条西5丁目13-2',
            'address2' => '第1旭観光ビル1階',
            'tel' => '011-531-0965',
            'email' => 'pussycat@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);

        DB::table('shops')->insert([
            'id' => 5,
            'slug' => 'en',
            'url' => '/en/',
            'name' => '艶',
            'postcode' => '064-0805',
            'address1' => '北海道札幌市中央区南5条西5丁目4-1',
            'address2' => '第8旭観光ビル2F',
            'tel' => '011-563-6969',
            'email' => 'en@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);

        DB::table('shops')->insert([
            'id' => 6,
            'slug' => 'siroganeze',
            'url' => '/siroganeze/',
            'name' => 'シロガネーゼ',
            'postcode' => '064-0805',
            'address1' => '北海道札幌市中央区南5条西5丁目4-1',
            'address2' => '第8旭観光ビル2F',
            'tel' => '011-521-3593',
            'email' => 'siroganeze@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);

        DB::table('shops')->insert([
            'id' => 7,
            'slug' => 'lovestory',
            'url' => '/lovestory/',
            'name' => 'ラブストーリー',
            'postcode' => '064-0805',
            'address1' => '北海道札幌市中央区南5条西5丁目4-1',
            'address2' => '第8旭観光ビル2F',
            'tel' => '011-512-4150',
            'email' => 'lovestory@plo-group.jp',
            'map' => '',
            'folder' => '',
            'video_folder' => '',
        ]);
    }
}
