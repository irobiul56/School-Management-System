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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->string('gender') -> nullable();
            $table->string('image') -> nullable();
            $table->string('fname') -> nullable();
            $table->string('mname') -> nullable();
            $table->string('address') -> nullable();
            $table->string('religion') -> nullable();
            $table->string('id_no') -> nullable();
            $table->string('dob') -> nullable();
            $table->string('role') -> nullable();
            $table->string('join_date') -> nullable();
            $table->string('designation_id') -> nullable();
            $table->string('salary') -> nullable();
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
        Schema::dropIfExists('admins');
    }
};
