<?php

namespace Database\Seeders;
use App\Models\UserPremission;

use Illuminate\Database\Seeder;

class DefaultUserPremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserPremission::create([
            'premission' => 'Administration',
        ])->save();
        UserPremission::create([
            'premission' => 'Admin',
        ])->save();
    }
}
