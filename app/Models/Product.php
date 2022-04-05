<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status',
        'name',
        'slug',
        'category_id',
        'image',
        'price',
        'indiscount',
        'discount',
        'content',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
