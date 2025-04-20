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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');  // Khóa ngoại đến bảng orders
            $table->string('payment_method');  // Phương thức thanh toán (COD, thẻ tín dụng, PayPal...)
            $table->decimal('amount', 8, 2);  // Số tiền thanh toán
            $table->enum('status', ['pending', 'completed', 'failed']);  // Trạng thái thanh toán
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
