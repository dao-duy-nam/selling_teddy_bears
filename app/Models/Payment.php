<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    protected $fillable = [
        'order_id', 'payment_method', 'amount', 'status'
    ];

    /**
     * Mối quan hệ với bảng Order
     * Một thanh toán thuộc về một đơn hàng
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Kiểm tra trạng thái thanh toán
     * Ví dụ: Kiểm tra xem thanh toán có hoàn tất hay không
     */
    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    /**
     * Mối quan hệ với bảng User (Nếu cần)
     * Nếu bạn muốn biết ai đã thực hiện thanh toán, bạn có thể thêm mối quan hệ này
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
