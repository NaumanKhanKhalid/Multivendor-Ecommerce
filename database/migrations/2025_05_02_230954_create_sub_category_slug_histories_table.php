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
        
        Schema::create('sub_category_slug_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_category_id')->constrained()->onDelete('cascade');
            $table->string('old_slug');
            $table->unsignedBigInteger('changed_by')->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_category_slug_histories');
    }
};
