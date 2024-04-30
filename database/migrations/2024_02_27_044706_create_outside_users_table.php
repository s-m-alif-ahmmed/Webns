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
        Schema::create('outside_users', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->text('company_logo');
            $table->string('company_email')->unique();
            $table->string('company_number')->unique();
            $table->text('company_address');
            $table->string('team_manager_name');
            $table->string('manager_designation');
            $table->string('manager_email')->unique();
            $table->string('manager_number')->unique();
            $table->string('manager_employ_id')->unique();
            $table->text('manager_employ_id_image');
            $table->text('manager_photo')->nullable();
            $table->string('password');
            $table->string('terms')->nullable();
            $table->integer('ban_status')->default(0);
            $table->string('approve_status')->default('Waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outside_users');
    }
};
