<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price'
    ];

    /**
     * Mối quan hệ với bảng Order
     * Một mục đơn hàng thuộc về một đơn hàng
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Mối quan hệ với bảng Product
     * Một mục đơn hàng liên kết với một sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Mối quan hệ với bảng Variant (nếu có)
     * Một mục đơn hàng có thể liên kết với một biến thể sản phẩm, nếu bạn sử dụng biến thể
     */
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    /**
     * Tính giá trị của mục đơn hàng
     * Giá trị của mục đơn hàng = Số lượng * Giá
     */
    public function getItemTotal()
    {
        return $this->quantity * $this->price;
    }
}
