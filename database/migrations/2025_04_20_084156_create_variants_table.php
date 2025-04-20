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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng products
            $table->string('size')->nullable();  // Kích thước (e.g., nhỏ, vừa, lớn)
            $table->string('color')->nullable();  // Màu sắc (e.g., đỏ, xanh, vàng)
            $table->decimal('price', 8, 2);  // Giá của biến thể sản phẩm (nếu có sự khác biệt so với sản phẩm gốc)
            $table->integer('stock_quantity');  // Số lượng tồn kho cho biến thể này
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
