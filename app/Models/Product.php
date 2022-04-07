<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function category(): HasOne
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(ProductGallery::class);
    }
}
