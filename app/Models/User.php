<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',         // Thêm trường 'image'
        'dob',           // Thêm trường 'dob' (Ngày sinh)
        'gender',        // Thêm trường 'gender' (Giới tính)
        'phone',         // Thêm trường 'phone' (Điện thoại)
        'address',       // Thêm trường 'address' (Địa chỉ)
        'role',          // Thêm trường 'role' (vai trò)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Mối quan hệ với bảng Orders
     * Một người dùng có thể có nhiều đơn hàng
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Mối quan hệ với bảng Reviews
     * Một người dùng có thể có nhiều đánh giá sản phẩm
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Mối quan hệ với bảng Payments
     * Một người dùng có thể có nhiều thanh toán
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Mối quan hệ với bảng OrderItems
     * Một người dùng có thể có nhiều sản phẩm trong các đơn hàng
     */
    public function orderItems()
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }
}
