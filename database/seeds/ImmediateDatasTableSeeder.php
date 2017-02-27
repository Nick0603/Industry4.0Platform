<?php

use Illuminate\Database\Seeder;

class ImmediateDatasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('immediate_datas')->delete();
        
        \DB::table('immediate_datas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'machine_id' => 1,
                'm_x' => -527.5,
                'm_y' => -48.0,
                'm_z' => -391.0,
                'abs_x' => -756.0,
                'abs_y' => -1479.0,
                'abs_z' => -1257.0,
                'created_at' => '2016-10-09 09:52:57',
                'updated_at' => '2017-02-25 18:21:36',
                'CodeName' => 'testCodeName',
                'runningGCode' => 'g25',
                'runningCodeIndex' => 1,
                'spinderLoad' => 54.0,
                'temperature' => 29.0,
            ),
            1 => 
            array (
                'id' => 2,
                'machine_id' => 2,
                'm_x' => 6.0,
                'm_y' => 42.0,
                'm_z' => 0.0,
                'abs_x' => 25.0,
                'abs_y' => -9.0,
                'abs_z' => -7.0,
                'created_at' => '2016-10-09 09:53:01',
                'updated_at' => '2017-01-02 03:50:42',
                'CodeName' => '',
                'runningGCode' => '',
                'runningCodeIndex' => 0,
                'spinderLoad' => 64.0,
                'temperature' => 33.0,
            ),
            2 => 
            array (
                'id' => 3,
                'machine_id' => 3,
                'm_x' => -25.0,
                'm_y' => -8.0,
                'm_z' => -2.0,
                'abs_x' => 5.0,
                'abs_y' => 20.0,
                'abs_z' => 40.0,
                'created_at' => '2016-12-13 15:04:42',
                'updated_at' => '2017-01-02 01:35:43',
                'CodeName' => '',
                'runningGCode' => '',
                'runningCodeIndex' => 0,
                'spinderLoad' => 81.0,
                'temperature' => 36.0,
            ),
            3 => 
            array (
                'id' => 4,
                'machine_id' => 4,
                'm_x' => 0.0,
                'm_y' => 0.0,
                'm_z' => 0.0,
                'abs_x' => 0.0,
                'abs_y' => 0.0,
                'abs_z' => 0.0,
                'created_at' => '2016-12-31 02:43:30',
                'updated_at' => '2016-12-31 02:43:30',
                'CodeName' => 'testCodeName4',
                'runningGCode' => 'G25',
                'runningCodeIndex' => 1,
                'spinderLoad' => 0.0,
                'temperature' => 0.0,
            ),
            4 => 
            array (
                'id' => 5,
                'machine_id' => 5,
                'm_x' => -16.0,
                'm_y' => 33.0,
                'm_z' => -19.0,
                'abs_x' => -27.0,
                'abs_y' => 3.0,
                'abs_z' => -15.0,
                'created_at' => '2016-12-31 02:49:42',
                'updated_at' => '2017-01-02 03:51:29',
                'CodeName' => 'testCodeName',
                'runningGCode' => 'test',
                'runningCodeIndex' => 0,
                'spinderLoad' => 89.0,
                'temperature' => 40.0,
            ),
        ));
        
        
    }
}
