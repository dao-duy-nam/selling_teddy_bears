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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng users
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng products
            $table->integer('rating');  // Đánh giá từ 1 đến 5
            $table->text('comment')->nullable();  // Bình luận về sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
