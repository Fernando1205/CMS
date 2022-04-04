<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'module',
        'name',
        'icono',
        'slug'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
