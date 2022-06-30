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
            $table->id();
       
            $table->bigInteger('teacher_id')->unsigned();
            $table->index('teacher_id');
            $table->string('name',200);
            $table->date('dob');
            $table->string('gender');
            $table->timestamps();
            $table->foreign('teacher_id')
            ->references('id')->on('teachers')
            ->onDelete('restrict');
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
