<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasicDataSpinderLoadAndTemperatureToImmediateDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('immediate_Datas', function (Blueprint $table) {
            $table->string('CodeName');
            $table->string('runningGCode');
            $table->bigInteger('runningCodeIndex');
            $table->double('spinderLoad');
            $table->double('temperature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('immediate_Datas', function (Blueprint $table) {
            $table->dropColumn('CodeName');
            $table->dropColumn('runningGCode');
            $table->dropColumn('runningCodeIndex');
            $table->dropColumn('spinderLoad');
            $table->dropColumn('temperature');
        });
    }
}
