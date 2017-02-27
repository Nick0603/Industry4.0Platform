<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'NTUST',
                'created_at' => '2016-10-09 09:25:45',
                'updated_at' => '2016-10-09 09:25:45',
                'address' => '台北市大安區基隆路四段43號',
                'email' => 'b10303008@mail.ntust.edu.tw',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'E1-161',
                'created_at' => '2016-10-09 09:33:48',
                'updated_at' => '2016-10-09 09:33:48',
                'address' => '台北市大安區基隆路四段43號E1-161',
                'email' => 'b10303008@mail.ntust.edu.tw',
            ),
        ));
        
        
    }
}
