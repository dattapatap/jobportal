<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            'id'=>'1',
            'description' => 'Html'
        ]);

        DB::table('skills')->insert([
            'id'=>'2',
            'description' => 'CSS'
        ]);

        DB::table('skills')->insert([
            'id'=>'3',
            'description' => 'Bootstrap'
        ]);
    }
}
