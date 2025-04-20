<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantImage extends Model
{
    /** @use HasFactory<\Database\Factories\VariantImageFactory> */
    use HasFactory;
    protected $fillable = [
        'variant_id', 'image'
    ];

    /**
     * Mối quan hệ với bảng Variant
     * Một ảnh biến thể thuộc về một biến thể sản phẩm
     */
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
