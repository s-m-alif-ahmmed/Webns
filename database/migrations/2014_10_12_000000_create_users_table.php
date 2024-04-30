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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('photo')->unique()->nullable();
            $table->string('officer_id')->nullable();
            $table->string('number',15)->nullable();
            $table->text('address')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('designation_id')->nullable();
            $table->longText('permission')->nullable();
            $table->integer('ban_status')->default(0);
            $table->string('role')->default('visitor');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
