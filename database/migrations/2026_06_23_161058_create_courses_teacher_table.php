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
        Schema::create('courses_teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('courses_teacher_id');
            $table->foreign('courses_teachers_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unsignedBigInteger('teachers_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->timestamps();
        });
    }

};
