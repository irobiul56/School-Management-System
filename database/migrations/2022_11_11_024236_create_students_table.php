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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id') -> nullable();
            $table->bigInteger('admin_id');
            $table->text('photo');
            $table->string('birthnumber');
            $table->string('gender');
            $table->string('fathername');
            $table->string('fnid');
            $table->string('mothername');
            $table->string('mnid');
            $table->string('fatherphone');
            $table->string('motherphone');
            $table->string('admitedclass');
            $table->bigInteger('admit_group') -> nullable();
            $table->bigInteger('shift');
            $table->bigInteger('year');
            $table->string('presentaddress');
            $table->string('permanentaddress');
            $table->string('gurdianname');
            $table->string('gurdianphone');
            $table->string('dob');
            $table->string('pastschool');
            $table->string('slug');
            $table->longText('adstatus') -> default(false);
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
        Schema::dropIfExists('students');
    }
};
