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
        Schema::create('support_messages', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('company_name');
            $table->string('designation');
            $table->string('email');
            $table->string('number');
            $table->string('choose_product');
            $table->longText('message');
            $table->text('note')->nullable();
            $table->string('status')->default('UnRead');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_messages');
    }
};
