<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('casts')->insert([
            'id' => 1,
            'name' => 'テストA',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34662/',
            'diary_email_from' => '',
            'diary_email_to' => 'test-a-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'id' => 2,
            'name' => 'テストB',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34662/',
            'diary_email_from' => '',
            'diary_email_to' => 'test-b-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '南條　あこ',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/82/',
            'diary_email_from' => '',
            'diary_email_to' => 'ako-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '山咲　花',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/116/',
            'diary_email_from' => '',
            'diary_email_to' => 'hana-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '黒川　芽衣子',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/118/',
            'diary_email_from' => '',
            'diary_email_to' => 'meiko-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '椿　いずみ',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/31436/',
            'diary_email_from' => '',
            'diary_email_to' => 'izumi-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '藤咲　凛',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/31932/',
            'diary_email_from' => '',
            'diary_email_to' => 'rin-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '藤井　美愛',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33497/',
            'diary_email_from' => '',
            'diary_email_to' => 'mia-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '朝桐　渚',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33675/',
            'diary_email_from' => '',
            'diary_email_to' => 'nagisa-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '上条　夢華',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33734/',
            'diary_email_from' => '',
            'diary_email_to' => 'yumeha-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '東条　愛莉',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33729/',
            'diary_email_from' => '',
            'diary_email_to' => 'airi-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '神崎　うた',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33835/',
            'diary_email_from' => '',
            'diary_email_to' => 'uta-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '星崎　京子',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33937/',
            'diary_email_from' => '',
            'diary_email_to' => 'kyouko-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '夏目　カレン',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34110/',
            'diary_email_from' => '',
            'diary_email_to' => 'karen-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '音宮　ひなの',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34175/',
            'diary_email_from' => '',
            'diary_email_to' => 'hinano-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '雨流　琴音',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34298/',
            'diary_email_from' => '',
            'diary_email_to' => 'kotone-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '舞原　海乃',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34329/',
            'diary_email_from' => '',
            'diary_email_to' => 'umino-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '永瀬　遥',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34256/',
            'diary_email_from' => '',
            'diary_email_to' => 'haruka-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '流川　保奈美',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34373/',
            'diary_email_from' => '',
            'diary_email_to' => 'honami-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '瀧谷　綾',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34520/',
            'diary_email_from' => '',
            'diary_email_to' => 'ayano-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '藤代　美沙',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34532/',
            'diary_email_from' => '',
            'diary_email_to' => 'misa-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '唯月　彩花',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34533/',
            'diary_email_from' => '',
            'diary_email_to' => 'ayaka-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '星野　空',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34568/',
            'diary_email_from' => '',
            'diary_email_to' => 'sora-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '芹沢　雪音',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34610/',
            'diary_email_from' => '',
            'diary_email_to' => 'yukine-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '椎名　華乃',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34651/',
            'diary_email_from' => '',
            'diary_email_to' => 'kano-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '愛瀬　のどか',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34637/',
            'diary_email_from' => '',
            'diary_email_to' => 'nodoka-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '一ノ瀬　雪',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33375/',
            'diary_email_from' => '',
            'diary_email_to' => 'yuki-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '赤倉　華澄',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/310/',
            'diary_email_from' => '',
            'diary_email_to' => 'kasumi-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '柊　れい',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34213/',
            'diary_email_from' => '',
            'diary_email_to' => 'rei-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '天海　百恵',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/314/',
            'diary_email_from' => '',
            'diary_email_to' => 'momoe-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '葉月　ゆり',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/31616/',
            'diary_email_from' => '',
            'diary_email_to' => 'yuri-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '白水　南乃',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/354/',
            'diary_email_from' => '',
            'diary_email_to' => 'nanno-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '水妃　優',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/364/',
            'diary_email_from' => '',
            'diary_email_to' => 'yuu-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '滝村　華菜',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/368/',
            'diary_email_from' => '',
            'diary_email_to' => 'kana-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '深瀬　純',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/31465/',
            'diary_email_from' => '',
            'diary_email_to' => 'jun-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '神谷　りな',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/31566/',
            'diary_email_from' => '',
            'diary_email_to' => 'rina-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '日向　真由',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/31928/',
            'diary_email_from' => '',
            'diary_email_to' => 'mayu-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '一条　星羅',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/33623/',
            'diary_email_from' => '',
            'diary_email_to' => 'seira-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '本条　アスカ',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34271/',
            'diary_email_from' => '',
            'diary_email_to' => 'asuka-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '綾瀬　みゆ',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34363/',
            'diary_email_from' => '',
            'diary_email_to' => 'miyu-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '香咲　舞',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34345/',
            'diary_email_from' => '',
            'diary_email_to' => 'mai-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '如月　愛華',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34513/',
            'diary_email_from' => '',
            'diary_email_to' => 'aika-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '月島　麗菜',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34527/',
            'diary_email_from' => '',
            'diary_email_to' => 'reina-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '園崎　由加梨',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34627/',
            'diary_email_from' => '',
            'diary_email_to' => 'yukari-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '黒輝　帆香',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34640/',
            'diary_email_from' => '',
            'diary_email_to' => 'honoka-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
        DB::table('casts')->insert([
            'name' => '愛沢　時愛',
            'shop_id' => 1,
            'joined_at' => '2025-03-10 12:00:00',
            'profile_url' => '/cast/34605/',
            'diary_email_from' => '',
            'diary_email_to' => 'toa-vip@plo-test.jp',
            'diary_email_password' => 'MGZMJLb6',
            'created_at' => '2025-03-10 12:00:00',
            'updated_at' => '2025-03-10 12:00:00',
        ]);
    }
}
