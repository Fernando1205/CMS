<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "product_invetory_variants";
    protected $fillable = [
        'product_id',
        'inventory_id',
        'name'
    ];
}
