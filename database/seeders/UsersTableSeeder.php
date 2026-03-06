<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'edit other shops diaries']);
        Permission::create(['name' => 'edit options']);
        Permission::create(['name' => 'edit personalities']);
        Permission::create(['name' => 'edit styles']);

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('edit other shops diaries');
        $adminRole->givePermissionTo('edit options');
        $adminRole->givePermissionTo('edit personalities');
        $adminRole->givePermissionTo('edit styles');

        $shopRole = Role::create(['name' => 'shop']);

        $touchvipRole = Role::create(['name' => 'touchvip']);

        $customerRole = Role::create(['name' => 'customer']);

        User::factory()->create([
            'id' => 1,
            'name' => '本部管理者',
            'email' => 'admin@plo-group.jp',
            'password' => bcrypt('9k@zC6iWZK_Qcp8j'),
        ])->assignRole('admin');

        User::factory()->create([
            'id' => 2,
            'name' => 'タッチVIP',
            'email' => 'touchvip@plo-group.jp',
            'password' => bcrypt('9fpgQTJZxe!RmWZc'),
        ])->assignRole('shop', 'touchvip');

        User::factory()->create([
            'id' => 3,
            'name' => '雫',
            'email' => 'shizuku@plo-group.jp',
            'password' => bcrypt('CUK*fta*qfk_cfn8'),
        ])->assignRole('shop');

        User::factory()->create([
            'id' => 4,
            'name' => '雅',
            'email' => 'miyabi@plo-group.jp',
            'password' => bcrypt('J*Fjpe7G@6!bj8AQ'),
        ])->assignRole('shop');

        User::factory()->create([
            'id' => 5,
            'name' => 'プッシーキャット',
            'email' => 'pussycat@plo-group.jp',
            'password' => bcrypt('Yg7K7kdN9@H*3@*d'),
        ])->assignRole('shop');

        User::factory()->create([
            'id' => 6,
            'name' => '艶',
            'email' => 'en@plo-group.jp',
            'password' => bcrypt('N3!4vN-XMxrJ.F44'),
        ])->assignRole('shop');

        User::factory()->create([
            'id' => 7,
            'name' => 'シロガネーゼ',
            'email' => 'siroganeze@plo-group.jp',
            'password' => bcrypt('r_Ytnxh2!Y@zPe!@'),
        ])->assignRole('shop');

        User::factory()->create([
            'id' => 8,
            'name' => 'ラブストーリー',
            'email' => 'lovestory@plo-group.jp',
            'password' => bcrypt('hf9yR_hCJUoDZTx4'),
        ])->assignRole('shop');

        User::factory()->create([
            'name' => 'お客様',
            'email' => 'customer@plo-group.jp',
            'password' => bcrypt('26ZbDBbtqAt_GmyB'),
        ])->assignRole($customerRole);

        // User::factory(10)->create();
    }
}
