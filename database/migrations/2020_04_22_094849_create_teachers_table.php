<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->bigIncrements('id');
            $table->string('matricule', 50)->unique();
            $table->string('fname', 25);
            $table->string('sname', 50)->nullable();
            $table->date('dateOfBirth');
            $table->string('placeOfBirth', 25);
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->enum('diploma', ['1st degree', 'masters','Phd','Doc'])->default('1st degree');
            $table->bigInteger('department_id')->unsigned();
            $table->enum('role', ['no role', 'Principal', 'Vice Principal', 'Discipline Master', 'Bursar', 'HOD', 'Dean'])->default('no role');
            $table->char('tel', 20)->unique();
            $table->string('address', 25)->nullable();
            $table->string('nation', 25)->default('Cameroon');
            $table->string('email', 25)->unique();
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
        Schema::dropIfExists('teachers');
    }
}
