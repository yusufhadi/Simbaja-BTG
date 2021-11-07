<?php

use App\skpd;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SkpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        skpd::create([
            'name' =>  'capil'
        ]);
        skpd::create([
            'name' =>    'kesehatan'
        ]);

        User::create([
            'name' => 'administrator',
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);
        User::create([
            'name' => 'users',
            'username' => 'user',
            'role' => 'user',
            'password' => Hash::make('user')
        ]);
        User::create([
            'name' => 'UKPBJ',
            'username' => 'UKPBJ',
            'role' => 'admin',
            'password' => Hash::make('btg123123')
        ]);
        User::create([
            'name' => 'bupati',
            'username' => 'bupati',
            'role' => 'user',
            'password' => Hash::make('bantaengbaik')
        ]);
        User::create([
            'name' => 'wakil bupati',
            'username' => 'wakilbupati',
            'role' => 'user',
            'password' => Hash::make('bantaengbaik')
        ]);
        User::create([
            'name' => 'sekda',
            'username' => 'sekda',
            'role' => 'user',
            'password' => Hash::make('bantaengbaik')
        ]);
    }
}
