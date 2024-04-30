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
        Schema::create('career_job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_job_post_id');
            $table->string('post_id');
            $table->string('full_name');
            $table->string('email');
            $table->integer('number');
            $table->string('expected_salary');
            $table->text('cover_letter');
            $table->text('resume');
            $table->text('slug_job_application')->nullable();
            $table->string('checked')->default('on');
            $table->string('shortlisted')->default('on');
            $table->string('interview_call')->default('on');
            $table->string('rejected')->default('on');
            $table->string('hired')->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_job_applications');
    }
};
