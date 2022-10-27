<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('course');
            $table->string('img')->nullable();
            $table->string('totalmeets');
            $table->string('age_requirement');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('course_prerequisite_id')->nullable();
            $table->text('description')->nullable();
            $table->string('application')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
