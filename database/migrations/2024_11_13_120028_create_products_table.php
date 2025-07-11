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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('slug_uz')->nullable();
            $table->string('slug_ru')->nullable();
            $table->string('slug_en')->nullable();
            $table->text('description_uz')->nullable();
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('content_uz')->nullable();
            $table->text('content_ru')->nullable();
            $table->text('content_en')->nullable();

            $table->string('image')->nullable(); // Asosiy rasm
            $table->json('images')->nullable(); // Qo‘shimcha rasmlar

            $table->enum('type', ['Featured', 'Popular Products', 'Best Seller', 'Special Offers', 'Top Rated Products'])->nullable(); // Masalan: "Elektronika", "Mebel"

            $table->decimal('price', 12, 2);
            $table->unsignedTinyInteger('discount_percent')->nullable(); // 0 - 100

            $table->decimal('final_price', 12, 2)->nullable(); // Chegirmali narx

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
