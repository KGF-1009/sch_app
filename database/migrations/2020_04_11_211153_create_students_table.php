<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id', 50); /*primary key see app/students*/
            $table->string('fname', 25); /*first name*/
            $table->string('sname', 50);/*middle and last  name*/
            $table->enum('sex', ['male', 'female']);
            $table->date('dateOfBirth');
            $table->string('placeOfBirth', 25);
            $table->string('address', 25);
            $table->string('email', 25)->unique();
            $table->timestamps();

            $table->primary('student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
