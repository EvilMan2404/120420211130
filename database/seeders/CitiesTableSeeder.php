<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dubai',
                'created_at' => '2021-04-12 12:55:49',
                'updated_at' => '2021-04-12 12:55:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dubai 2',
                'created_at' => '2021-04-12 12:55:49',
                'updated_at' => '2021-04-12 12:55:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Харьков',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}