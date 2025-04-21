<?php

namespace App\Models;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name', 'category_id', 'description', 'price', 'stock_quantity', 'image'
    ];

    /**
     * Mối quan hệ với bảng Category
     * Một sản phẩm thuộc về một danh mục
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Mối quan hệ với bảng Variant
     * Một sản phẩm có thể có nhiều biến thể
     */
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Mối quan hệ với bảng Review
     * Một sản phẩm có thể có nhiều đánh giá
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Mối quan hệ với bảng OrderItem
     * Một sản phẩm có thể có nhiều mục trong đơn hàng
     */
    public function orderItems()
    {
        return $this->hasManyThrough(OrderItem::class, Variant::class);
    }
}
