<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderIdToUtilizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utilizations', function (Blueprint $table) {
            $table->integer('order_id')->unsinged()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utilizations', function (Blueprint $table) {
            $table->dropColumn('order_id');
        });
    }
}
