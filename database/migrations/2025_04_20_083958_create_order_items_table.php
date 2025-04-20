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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng products
            $table->integer('quantity');  // Số lượng sản phẩm trong đơn hàng
            $table->decimal('price', 8, 2);  // Giá của mỗi sản phẩm tại thời điểm mua
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
