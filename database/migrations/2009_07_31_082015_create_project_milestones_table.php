<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_milestones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id');
            $table->string('milestone');
            $table->integer('point')->default(0);
            $table->string('description')->nullable();
            $table->string('studentmodul_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('quiz_name)')->nullable();
            $table->unsignedBigInteger('orderno')->default(1);
            $table->string('video_start')->nullable();
            $table->string('video_end')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_milestones');
    }
}
