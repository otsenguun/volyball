<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DefaultUserPremissionSeeder::class,
            DefaultUserSeeder::class,
            DefaultArticleCategorySeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
