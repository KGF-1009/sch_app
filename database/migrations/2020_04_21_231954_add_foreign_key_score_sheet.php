<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyScoreSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_sheets', function (Blueprint $table) {
            //
            $table->string('course_id', 50);
            $table->string('student_id', 50);

            $table->foreign('course_id')->references('course_id')->on('courses') ->onDelete('cascade');

            $table->foreign('student_id')->references('student_id')->on('students') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score_sheet', function (Blueprint $table) {
            //
             $table->dropColumn('course_id');
             $table->dropColumn('student_id');
        });
    }
}
