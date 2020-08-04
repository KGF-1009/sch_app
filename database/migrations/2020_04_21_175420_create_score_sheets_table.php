<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_sheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->string('course_id', 50);
            //$table->string('student_id', 50);
            $table->double('score', 4, 2)->nullable();
            $table->boolean('confirmed');
            $table->enum('semester', array('1','2','3','4'));
            $table->enum('academic_year', array('2019/2020','2020/2021','2021/2022','2022/2023','2023/2024','2024/2025','2025/2026','2026/2027','2027/2028','2028/2029','2029/2030', '2030/2031','2031/2032', '2032/2033'));
            $table->timestamps();

            $table->engine = 'InnoDB';
            //course_id, student_id, semester, academin_year must be unique.            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_sheets');
    }
}
