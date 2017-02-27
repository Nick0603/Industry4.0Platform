<?php

use Illuminate\Database\Seeder;

class RemarksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('remarks')->delete();
        
        \DB::table('remarks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'utilization_id' => 1,
                'title' => '模具架設 test',
                'content' => '測試內容測試內容測試內容',
                'created_at' => '2016-12-12 16:30:28',
                'updated_at' => '2016-12-19 10:05:44',
            ),
            1 => 
            array (
                'id' => 2,
                'utilization_id' => 2,
                'title' => '模具架設  1102',
                'content' => '測試內容測試內容 2016-11-02',
                'created_at' => '2016-12-14 00:24:12',
                'updated_at' => '2016-12-14 16:27:37',
            ),
            2 => 
            array (
                'id' => 3,
                'utilization_id' => 5,
                'title' => '測試3修改',
                'content' => '測試3測試3',
                'created_at' => '2016-12-14 16:35:27',
                'updated_at' => '2016-12-14 16:36:00',
            ),
            3 => 
            array (
                'id' => 4,
                'utilization_id' => 39,
                'title' => '測試六',
                'content' => '測試六內容測試六內容測試六內容',
                'created_at' => '2016-12-14 16:35:47',
                'updated_at' => '2016-12-14 16:35:47',
            ),
            4 => 
            array (
                'id' => 5,
                'utilization_id' => 4,
                'title' => 'test',
                'content' => 'test',
                'created_at' => '2017-01-29 23:53:03',
                'updated_at' => '2017-01-29 23:53:03',
            ),
        ));
        
        
    }
}
