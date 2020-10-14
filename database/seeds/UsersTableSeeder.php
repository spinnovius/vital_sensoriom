<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
        DB::table('users')->insert([
        'fname' => 'test',
        'lname' => 'admin',
        'email' => 'test.admin@gmail.com',
        'password' => app('hash')->make('test@admin'),
        'contact_number' => '8460521189',
        'role_id' => '1',
        ]);

        DB::table('users')->insert([
        'fname' => 'test',
        'lname' => 'doctor',
        'email' => 'test.doctor@gmail.com',
        'password' => app('hash')->make('test@doctor'),
        'contact_number' => '8460521189',
        'role_id' => '2',
        ]);

        DB::table('users')->insert([
        'fname' => 'test',
        'lname' => 'coach',
        'email' => 'test.coach@gmail.com',
        'password' => app('hash')->make('test@coach'),
        'contact_number' => '8460521189',
        'role_id' => '3',
        ]);

        DB::table('users')->insert([
        'fname' => 'test',
        'lname' => 'patient',
        'email' => 'test.patient@gmail.com',
        'password' => app('hash')->make('test@patient'),
        'contact_number' => '8460521189',
        'role_id' => '4',
        ]);
    }
}
