<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'premission' => 1,
            'lname' => 'Adiya',
            'fname' => 'Ganbat',
            'nickname' => 'Yagami Raito',
            'phone' => '94166478',
            'birthday' => '1997-12-17',
            'email' => 'yagamipassion0322@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ])->save();
    }
}
