<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePositionToImmediateDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('positions', function (Blueprint $table) {
            Schema::rename('positions', 'immediate_datas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('immediate_datas', function (Blueprint $table) {
            Schema::rename('immediate_datas', 'positions');
        });
    }
}
