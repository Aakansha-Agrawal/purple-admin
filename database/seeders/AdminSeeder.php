<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = User::class;

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '8345016765',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'aakansha',
            'email' => 'aakansha@gmail.com',
            'phone' => '8345016765',
            'password' => Hash::make('aakansha'),
            'role' => 'renter',
        ]);
        DB::table('users')->insert([
            'name' => 'aastha',
            'email' => 'aastha@gmail.com',
            'phone' => '8345016765',
            'password' => Hash::make('aastha'),
            'role' => 'service',
        ]);
    }
}
