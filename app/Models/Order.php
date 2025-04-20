<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id', 'status', 'total_price', 'shipping_address'
    ];

    /**
     * Mối quan hệ với bảng User
     * Một đơn hàng thuộc về một người dùng
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mối quan hệ với bảng OrderItem
     * Một đơn hàng có thể có nhiều mục đơn hàng (Order Items)
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Tính tổng giá trị của đơn hàng
     * Bạn có thể sử dụng phương thức này để tính toán lại giá trị đơn hàng, nếu cần
     */
    public function calculateTotalPrice()
    {
        return $this->orderItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
    }
}
