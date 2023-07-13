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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->integer('nim');
            $table->string('email',120);
            $table->integer('phone_number');
            $table->string('faculty', 100);
            $table->string('major', 150);
            $table->string('program_study', 150);
            $table->unsignedBigInteger('lecture');

            $table->timestamps();

            $table->foreign('lecture')->references('id')->on('lecture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
};
