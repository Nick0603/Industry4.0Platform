<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('UsersTableSeeder');
        $this->call('BulletinBoardsTableSeeder');
        $this->call('CompaniesTableSeeder');
        $this->call('ImmediateDatasTableSeeder');
        $this->call('MachinesTableSeeder');
        $this->call('OrdersTableSeeder');
        $this->call('RemarksTableSeeder');
        $this->call('UtilizationsTableSeeder');
        $this->call('PasswordResetsTableSeeder');
    }
}
