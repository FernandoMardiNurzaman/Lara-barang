<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@me.com",
            'password' => Hash::make("admin12345"),
            'position' => "Manager",
            'gender' => "laki-laki",
            'image_user' => null,
        ]);
    }
}
