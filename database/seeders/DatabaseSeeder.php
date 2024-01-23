<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name' => 'mahrus',
                'email' => 'mahrus@pcr.ac.id',
                'password' => \Hash::make("mahrus@pcr.ac.id"),
                'admin' => true,
            ],
            [
                'name' => 'mif',
                'email' => 'mif@pcr.ac.id',
                'password' => \Hash::make("mif@pcr.ac.id"),
                'admin' => false,
            ],
            [
                'name' => 'adil',
                'email' => 'adil@pcr.ac.id',
                'password' => \Hash::make("adil@pcr.ac.id"),
                'admin' => true,
            ]
        ]);
    }
}
