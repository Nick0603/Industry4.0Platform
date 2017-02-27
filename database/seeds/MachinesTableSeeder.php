<?php

use Illuminate\Database\Seeder;

class MachinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('machines')->delete();
        
        \DB::table('machines')->insert(array (
            0 => 
            array (
                'id' => 1,
                'company_id' => 1,
                'created_at' => '2016-10-09 09:53:42',
                'updated_at' => '2016-12-29 04:03:15',
                'name' => '第一機台',
                'address' => '台科大第一工廠',
            ),
            1 => 
            array (
                'id' => 2,
                'company_id' => 1,
                'created_at' => '2016-10-09 09:54:12',
                'updated_at' => '2016-10-11 06:55:31',
                'name' => '第二機台',
                'address' => '台科大第二工廠',
            ),
            2 => 
            array (
                'id' => 3,
                'company_id' => 1,
                'created_at' => '2016-12-13 15:04:23',
                'updated_at' => '2016-12-15 15:36:45',
                'name' => '第三機台',
                'address' => '台科大第三工廠',
            ),
            3 => 
            array (
                'id' => 4,
                'company_id' => 3,
                'created_at' => '2016-12-31 02:10:26',
                'updated_at' => '2016-12-31 02:10:26',
                'name' => '實驗三軸機',
                'address' => 'E1-161',
            ),
            4 => 
            array (
                'id' => 5,
                'company_id' => 1,
                'created_at' => '2016-12-31 02:49:16',
                'updated_at' => '2016-12-31 02:49:16',
                'name' => '五軸加工機',
                'address' => '台科大第四工廠',
            ),
        ));
        
        
    }
}
