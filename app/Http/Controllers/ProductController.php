<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        $gallery = $product->gallery()->get();
        return view('product.show', compact('product','gallery'));
    }
}
