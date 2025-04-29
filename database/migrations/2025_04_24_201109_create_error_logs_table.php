<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->string('module')->default('Product');
            $table->string('action')->nullable(); // create, update, delete
            $table->string('message');
            $table->text('stack_trace')->nullable();
            $table->string('status')->default('Needs Fix');
            $table->json('input')->nullable();
            $table->uuid('user_id')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('error_logs');
    }
};
