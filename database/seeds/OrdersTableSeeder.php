<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'company_id' => 1,
                'name' => '韌化陶瓷刀具',
                'itemType' => 'ntust00001',
                'status' => '生產中',
                'description' => '這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試，這是描述測試。',
                'created_at' => '2016-12-12 23:20:49',
                'updated_at' => '2016-12-12 23:20:49',
            ),
            1 => 
            array (
                'id' => 2,
                'company_id' => 1,
                'name' => '測試工作件二名稱',
                'itemType' => 'ntust00002',
                'status' => '加工中',
                'description' => '測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二測試二',
                'created_at' => '2016-12-13 15:06:25',
                'updated_at' => '2016-12-13 15:06:25',
            ),
            2 => 
            array (
                'id' => 3,
                'company_id' => 1,
                'name' => '測試工作件三名稱',
                'itemType' => 'ntust00003',
                'status' => '加工中',
                'description' => '測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三測試三',
                'created_at' => '2016-12-13 15:07:00',
                'updated_at' => '2016-12-13 15:07:00',
            ),
        ));
        
        
    }
}
