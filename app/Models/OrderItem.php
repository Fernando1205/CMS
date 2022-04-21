<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'orders_items';
    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'inventory_id',
       'label_item',
        'quantity',
        'discount_status',
        'discount',
        'price_unit',
        'total',
    ];
}
