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
        Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('slug')->unique();
    $table->text('description')->nullable();
    $table->text('short_description')->nullable();

    $table->decimal('price', 10, 2)->default(0);
    $table->enum('discount_type', ['percentage', 'fixed'])->nullable();
    $table->decimal('discount_amount', 10, 2)->nullable();
    $table->decimal('final_price', 10, 2)->default(0);

    $table->enum('type', ['simple', 'variable'])->default('simple');
    $table->string('sku')->unique();
    $table->integer('quantity')->default(0);
    $table->boolean('track_quantity')->default(true);

    $table->enum('status', ['active', 'inactive', 'draft'])->default('inactive');
    $table->boolean('is_new')->default(false);
    $table->boolean('is_featured')->default(false);

    $table->decimal('average_rating', 3, 2)->default(0);
    $table->integer('review_count')->default(0);
    $table->integer('sales_count')->default(0);

    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
