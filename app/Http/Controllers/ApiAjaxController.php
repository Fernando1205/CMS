<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAjaxController extends Controller
{
    public function getProductsSection(Request $request): JsonResponse
    {
        $section = $request->section;
        switch ($section) {
            case 'home':
                $products = Product::where('status',1)->inRandomOrder()->paginate(4);
                break;

            default:
                $products = Product::where('status',1)->inRandomOrder()->paginate(4);
                break;
        }
        return response()->json(['products' => $products]);
    }

    public function postFavoriteAdd($id,$module,Request $request ): JsonResponse
    {
        $userId = Auth::id();
        try {
            $query = Favorite::where('user_id',$userId)->where('module',$module)->where('product_id',$id)->count();
            if($query){
                return response()
                    ->json(['message' => 'Este item ya está en tus favoritos','status' => 'exists'],200);
            } else {
                Favorite::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                    'module' => $module
                ]);
            }

            return response()->json(['message' => 'Agregado a favoritos'],200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()],400);
        }

    }
}
