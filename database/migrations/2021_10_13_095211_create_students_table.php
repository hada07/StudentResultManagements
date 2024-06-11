<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->string('college_id')->index()->unique();
            $table->string('name')->index();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->boolean('isAcept')->default(false);
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
        Schema::dropIfExists('students');
    }
}
