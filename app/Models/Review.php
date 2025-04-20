<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id', 'product_id', 'rating', 'comment'
    ];

    /**
     * Mối quan hệ với bảng User
     * Một đánh giá thuộc về một người dùng
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mối quan hệ với bảng Product
     * Một đánh giá liên kết với một sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Kiểm tra đánh giá có hợp lệ không (1 <= rating <= 5)
     */
    public function isValidRating()
    {
        return $this->rating >= 1 && $this->rating <= 5;
    }
}
