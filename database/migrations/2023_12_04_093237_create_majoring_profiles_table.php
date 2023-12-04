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
        Schema::create('majoring_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('majoring');
            $table->string('faculty');
            $table->string('university');
            $table->string('program_type');
            $table->string('accreditation');
            $table->string('study_time');
            $table->string('vision');
            $table->string('mission');
            $table->string('student_competence');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majoring_profiles');
    }
};
