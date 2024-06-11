<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('students_id')->unsigned();
            $table->bigInteger('subjects_id')->unsigned();
            $table->float('mark')->nullable();
            $table->float('mark_4')->nullable();
            $table->string('mark_char')->nullable();
            $table->foreign('students_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subjects_id')->references('id')->on('subjects')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('study');
    }
}
