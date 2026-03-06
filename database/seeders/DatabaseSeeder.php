<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(CastsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(PersonalitiesTableSeeder::class);
        $this->call(StylesTableSeeder::class);
        $this->call(ShopUserTableSeeder::class);
    }
}
