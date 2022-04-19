<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiAjaxController extends Controller
{
    public function getProductsSection(Request $request): JsonResponse
    {
        $section = $request->section;
        switch ($section) {
            case 'home':
                $products = Product::where('status',1)->inRandomOrder()->paginate(10);
                break;

            default:
                $products = Product::where('status',1)->inRandomOrder()->paginate(10);
                break;
        }
        return response()->json(['products' => $products]);
    }
}
