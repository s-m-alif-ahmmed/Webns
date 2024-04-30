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
        Schema::create('outside_user_players', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outside_user_id');
            $table->string('name');
            $table->string('number')->unique();
            $table->string('email')->unique();
            $table->text('image');
            $table->string('designation');
            $table->string('employ_id')->unique();
            $table->text('employ_id_image');
            $table->string('player_type');
            $table->string('status')->default('Waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outside_user_players');
    }
};
