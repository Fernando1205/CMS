<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index');
    }

    public function create(): View
    {
        $categories = Category::where('module', '0')->get();
        return view('admin.products.create',compact('categories'));
    }

    public function store(ProductRequest $request, ImageService $imageService): RedirectResponse
    {
        try {
            if($request->has('image')){
                $path = $imageService->saveImage($request->file('image'));
            }

            Product::create([
                'status' => 0,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path,
                'price' => $request->price,
                'indiscount' => $request->indiscount,
                'discount' => $request->discount ?? 0,
                'content' => $request->content,
            ]);

            return redirect()->back()->with('success','Producto creado exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
