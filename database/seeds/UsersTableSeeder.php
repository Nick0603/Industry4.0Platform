<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'company_id' => 1,
                'name' => 'Nick Chen',
                'email' => 'b10303008@gmail.com',
                'password' => '$2y$10$6QTwG9nkmmolfu880087DuNK6wGZvtz7ajl5P2ye5XiOgdnKQN/Ny',
                'remember_token' => 'GfClsPgsxRm59QmFnTHnFrWsQlzkIBYkHh2gohVIHrsXV8VPDj0wDfRQj1EH',
                'created_at' => '2016-10-09 09:37:15',
                'updated_at' => '2017-02-25 18:30:57',
            ),
            1 => 
            array (
                'id' => 2,
                'company_id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$1IidfSIvinIFoPIqhFgyG.SOWB4NzqzD9tXvKqO5SoRcnKYSosfO2',
                'remember_token' => '2iV37WxeGGNb0XxsrZs4pzz61Gyn3F7qGNDdWAJMMESIHYp8bAoqINI4jT6r',
                'created_at' => '2016-10-09 09:41:31',
                'updated_at' => '2017-01-02 01:44:06',
            ),
            2 => 
            array (
                'id' => 3,
                'company_id' => 1,
                'name' => 'Ken',
                'email' => 'test@gmail.com',
                'password' => '$2y$10$9UoVW2vTC.N1MLS4fzaOmuEmGZ13SA3CTvgfKw.e4e4H194YIEvaK',
                'remember_token' => '5FHX8428KDOwKteV2egcKVoGeeGs79DTfs1a7hVAPGx2YK4JA8MbDzHjsc9e',
                'created_at' => '2016-10-09 16:09:59',
                'updated_at' => '2016-10-25 06:40:15',
            ),
            3 => 
            array (
                'id' => 4,
                'company_id' => 1,
                'name' => 'ㄊㄇㄒ',
                'email' => 'm850207@gmail.com',
                'password' => '$2y$10$IYPqGiYLq46iLP.zujddPe4UFJ/.hcWhf9/HdsYudLX1rtSVRZt7K',
                'remember_token' => NULL,
                'created_at' => '2016-10-10 03:23:32',
                'updated_at' => '2016-10-10 03:23:32',
            ),
            4 => 
            array (
                'id' => 5,
                'company_id' => 1,
                'name' => 'Mail_test',
                'email' => 'nick19700101@gmail.com',
                'password' => '$2y$10$As6/PnSLXgltuKmR5v5UqOZS2PBjiFQO2hzhr5YQ6RHHVQHsGGizO',
                'remember_token' => 'zCQfjn98tqAeWpRzzOKjkr3d8Qn289Osii1BZYtn2hQr8ZDpraGsFT9kgjvm',
                'created_at' => '2016-11-03 12:52:27',
                'updated_at' => '2016-12-27 14:51:16',
            ),
            5 => 
            array (
                'id' => 6,
                'company_id' => 3,
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => '$2y$10$ZEJbGhOS0IvEjbGHB.MRNejSnCRJV9ZZCKiJJ7QfmhtWbrlzjxU9W',
                'remember_token' => 'Vdlk4xzQAj3IAunB9G1WBtHEFq4P3z4aOp93Qf5H6caXeAgcJh4cJNSYa6HB',
                'created_at' => '2016-12-31 02:08:28',
                'updated_at' => '2016-12-31 03:01:56',
            ),
        ));
        
        
    }
}
