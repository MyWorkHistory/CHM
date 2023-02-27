<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('wachtwoord'),
            'role_id' => '1'
           ]);

           DB::table('users')->insert([
            'name' => 'delano',
            'email' => 'dillie.prive@Outlook.com',
            'password' => Hash::make('wachtwoord'),
            'role_id' => '2'
           ]);
    }
}
