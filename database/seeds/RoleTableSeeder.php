<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('role')->insert([
        'role' => 'Master Admin',
        ]);
        DB::table('role')->insert([
        'role' => 'Doctor',
        ]);
        DB::table('role')->insert([
        'role' => 'Coach',
        ]);
        DB::table('role')->insert([
        'role' => 'Patient',
        ]);
    }
}
