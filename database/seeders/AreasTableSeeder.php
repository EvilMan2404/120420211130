<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('areas')->delete();
        
        \DB::table('areas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Business Bay Area',
                'created_at' => '2021-04-12 12:55:03',
                'updated_at' => '2021-04-12 12:55:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Business Bay Area 2',
                'created_at' => '2021-04-12 12:55:03',
                'updated_at' => '2021-04-12 12:55:03',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Харьковская область',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}