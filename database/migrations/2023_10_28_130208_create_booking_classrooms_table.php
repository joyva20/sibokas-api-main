<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_classrooms', function (Blueprint $table) {
            $table->id();
            $table->time('time_in');
            $table->time('time_out');
            $table->integer('status')->comment('1:checked in, 2:checked out');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('classroom_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_classrooms');
    }
};
