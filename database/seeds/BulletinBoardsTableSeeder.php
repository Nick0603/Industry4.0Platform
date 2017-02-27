<?php

use Illuminate\Database\Seeder;

class BulletinBoardsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bulletin_boards')->delete();
        
        \DB::table('bulletin_boards')->insert(array (
            0 => 
            array (
                'id' => 1,
                'company_id' => 1,
                'title' => '馬達研發突破',
                'content' => '這是測試內容!!',
                'created_at' => '2016-12-13 00:00:00',
                'updated_at' => '2016-12-13 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'company_id' => 1,
                'title' => '105-1學期專題進度完成',
                'content' => '馬達即時資訊、稼動率資訊',
                'created_at' => '2016-12-30 11:33:42',
                'updated_at' => '2016-12-30 11:33:42',
            ),
        ));
        
        
    }
}
