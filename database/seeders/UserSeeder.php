<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([            
            'name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@admin.com',
            'mobile' => '7620297516',
            'password' => bcrypt('password')
        ]);
        DB::table('users')->insert([           
            'name' => 'Recruiter',
            'role_id' => 2,
            'email' => 'reqruiter@user.com',
            'mobile' => '7620297516',
            'password' => bcrypt('password')
        ]);
        DB::table('users')->insert([           
            'name' => 'Employee',
            'role_id' => 3,
            'email' => 'employee@user.com',
            'mobile' => '7620297516',
            'password' => bcrypt('password')
        ]);

    }
}
