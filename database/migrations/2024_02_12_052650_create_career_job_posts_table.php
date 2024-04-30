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
        Schema::create('career_job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_department_id');
            $table->foreignId('career_designation_id');
            $table->string('prefix_id');
            $table->text('job_title');
            $table->string('job_type');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('location');
            $table->string('salary');
            $table->text('job_description');
            $table->date('deadline');
            $table->string('status')->default('Publish');
            $table->text('slug_job_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_job_posts');
    }
};
