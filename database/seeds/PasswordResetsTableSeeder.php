<?php

use Illuminate\Database\Seeder;

class PasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('password_resets')->delete();
        
        \DB::table('password_resets')->insert(array (
            0 => 
            array (
                'email' => 'admin@gmail.com',
                'token' => '9f956bfa8ad74352d2f93e0a71d5ced92516572ba11435caa047ef2370bfab61',
                'created_at' => '2016-11-11 16:16:08',
            ),
        ));
        
        
    }
}
