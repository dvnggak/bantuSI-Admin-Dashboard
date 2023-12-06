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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nidn')->unique();
            $table->string('name');
            $table->string('gender');
            $table->string('university');
            $table->string('faculty');
            $table->string('study_program');
            $table->string('functional_position');
            $table->string('employment_status');
            $table->string('highest_education');
            $table->string('status');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
