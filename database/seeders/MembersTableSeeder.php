<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission::create(['name' => 'edit other shops diaries']);
        // Permission::create(['name' => 'edit options']);
        // Permission::create(['name' => 'edit personalities']);
        // Permission::create(['name' => 'edit styles']);

        // $adminRole = Role::create(['name' => 'admin']);
        // $adminRole->givePermissionTo('edit other shops diaries');
        // $adminRole->givePermissionTo('edit options');
        // $adminRole->givePermissionTo('edit personalities');
        // $adminRole->givePermissionTo('edit styles');

        // $shopRole = Role::create(['name' => 'shop']);

        // $touchvipRole = Role::create(['name' => 'touchvip']);

        // $customerRole = Role::create(['name' => 'customer']);

        // $memberRole = Role::create(['name' => 'member']);

        Member::factory()->create([
            'id' => 99990,
            'name' => 'テスト１',
            'subname' => 'テスト１',
            'email' => 'test01@gmail.com',
            'password' => bcrypt('test0610'),
            'tel' => '08055550001',
            'pref_id' => 1,
        ])->assignRole('member');

        Member::factory()->create([
            'id' => 99991,
            'name' => 'テスト２',
            'subname' => 'テスト２',
            'email' => 'test02@gmail.com',
            'password' => bcrypt('test0610'),
            'tel' => '08055550002',
            'pref_id' => 1,
        ])->assignRole('member');

        Member::factory()->create([
            'id' => 99992,
            'name' => 'テスト３',
            'subname' => 'テスト３',
            'email' => 'test03@gmail.com',
            'password' => bcrypt('test0610'),
            'tel' => '08055550003',
            'pref_id' => 1,
        ])->assignRole('member');

        Member::factory()->create([
            'id' => 99993,
            'name' => 'テスト４',
            'subname' => 'テスト４',
            'email' => 'test04@gmail.com',
            'password' => bcrypt('test0610'),
            'tel' => '08055550004',
            'pref_id' => 1,
        ])->assignRole('member');

        Member::factory()->create([
            'id' => 99994,
            'name' => 'テスト５',
            'subname' => 'テスト５',
            'email' => 'test05@gmail.com',
            'password' => bcrypt('test0610'),
            'tel' => '08055550005',
            'pref_id' => 1,
        ])->assignRole('member');

 
        // User::factory(10)->create();
    }
}
