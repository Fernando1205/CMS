<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'o_number',
        'status',
        'o_type',
        'user_id',
        'user_comment',
        'subtotal',
        'delivery',
        'total',
        'user_address_id',
        'payment_method',
        'payment_info',
    ];

    public function getItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
