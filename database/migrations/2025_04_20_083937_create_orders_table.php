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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng users
            $table->string('status');  // Trạng thái đơn hàng (pending, completed, cancelled...)
            $table->decimal('total_price', 8, 2);  // Tổng giá trị đơn hàng
            $table->text('shipping_address');  // Địa chỉ giao hàng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
