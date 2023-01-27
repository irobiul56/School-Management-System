<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorialmarksmodels', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('user_id');
            $table->bigInteger('id_no')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->integer('assign_subject_id')->nullable();
            $table->integer('tutorial_for_terminal_exam')->nullable();
            $table->double('first_tutorial')->default(false);
            $table->double('second_tutorial')->default(false);
            $table->double('third_tutorial')->default(false);
            $table->double('forth_tutorial')->default(false);
            $table->double('fifth_tutorial')->default(false);
            $table->double('six_tutorial')->default(false);
            $table->boolean('status') -> default(true);
            $table->boolean('trash') -> default(false);
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
        Schema::dropIfExists('tutorialmarksmodels');
    }
};
