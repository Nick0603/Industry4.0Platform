<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtilizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('machine_id')->unsinged()->index();
            $table->integer('order_id')->unsinged()->index();
            $table->double('busyTimer');
            $table->double('idleTimer');
            $table->double('alarmTimer');
            $table->double('offTimer');
            $table->date('date');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('utilizations');
    }
}
