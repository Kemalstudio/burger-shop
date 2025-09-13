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
        // Эта таблица связывает товары и добавки
        Schema::create('additive_product', function (Blueprint $table) {
            $table->id();
            // Внешний ключ к таблице products
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // Внешний ключ к таблице additives
            $table->foreignId('additive_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additive_product');
    }
};
