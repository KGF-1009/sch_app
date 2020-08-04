<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_sheets', function (Blueprint $table) {

            $table->double('score_ex', 4, 2)->default(0);
            $table->boolean('confirmed_ex');;
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score_sheets', function (Blueprint $table) {
            //
            $table->dropColumn('score_ex');
            $table->dropColumn('confirmed_ex');
        });
    }
}
