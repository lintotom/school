<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mark_id')->unsigned();
            $table->index('mark_id');
            $table->bigInteger('subject_id')->unsigned();
            $table->index('subject_id');
            
            $table->integer('mark');

            $table->foreign('mark_id')
            ->references('id')->on('marks')
            ->onDelete('cascade');
            $table->foreign('subject_id')
            ->references('id')->on('subjects')
            ->onDelete('cascade');
          
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
        Schema::dropIfExists('mark_lists');
    }
}
