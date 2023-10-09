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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code')->unique();
            $table->string('subject_name');
            $table->string('subject_type');
            $table->string('subject_credit');
            $table->string('subject_lecturer');
            $table->string('subject_day');
            $table->string('subject_time');
            $table->string('subject_enrollment_code');
            $table->string('subject_enrollment_link');
            $table->string('subject_group_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
