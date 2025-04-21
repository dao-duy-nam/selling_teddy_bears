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
            $table->string('name');  // Tên sản phẩm
            $table->foreignId('category_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng categories
            $table->text('description');  // Mô tả sản phẩm
            $table->decimal('price', 8, 2);  // Giá sản phẩm
            $table->integer('stock_quantity');  // Số lượng tồn kho
            $table->string('image')->nullable();
            $table->softDeletes();  // Hình ảnh sản phẩm
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
