<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education')->insert([            
            'name' => '10Th',
        ]);
        DB::table('education')->insert([            
            'name' => '12Th',
        ]);
        DB::table('education')->insert([            
            'name' => 'Graduation',
        ]);
        DB::table('education')->insert([            
            'name' => 'Post Graduation',
        ]);
        DB::table('education')->insert([            
            'name' => 'Masters',
        ]);

    }
}
