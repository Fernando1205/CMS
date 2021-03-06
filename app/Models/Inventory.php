<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'inventory';
    protected $fillable = [
        'product_id',
        'name',
        'stock',
        'price',
        'limit',
        'min',
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }
}
