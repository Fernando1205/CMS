<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductGalleryRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductSearchRequest;
use App\Http\Requests\ProductUpdRequest;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderBy('id','desc')->with('category')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function filter($status): View
    {
        switch ($status) {
            case '0':
                $products = Product::orderBy('id','desc')
                    ->with('category')
                    ->where('status',$status)
                    ->paginate(10);
                break;
            case '1':
                $products = Product::orderBy('id','desc')
                    ->with('category')
                    ->where('status',$status)
                    ->paginate(10);
                break;
            case 'trash':
                $products = Product::onlyTrashed()
                    ->orderBy('id','desc')
                    ->with('category')
                    ->paginate(10);
                break;

            default:
                $products = [];
                break;
        }
        return view('admin.products.index', compact('products'));
    }

    public function search(ProductSearchRequest $request): View
    {
        $products = Product::where($request->search,'like', '%'. $request->text.'%')
            ->orderBy('id','desc')
            ->with('category')
            ->paginate(10);

        return view('admin.products.index', compact('products'));
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
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path,
                'price' => $request->price,
                'indiscount' => $request->indiscount,
                'discount' => $request->discount ?? 0,
                'content' => $request->content,
                'code' => $request->code,
                'stock' => $request->stock
            ]);

            return redirect()->back()->with('success','Producto creado exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }


    public function edit(Product $product): View
    {
        $categories = Category::where('module', '0')->get();
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(ProductUpdRequest $request, Product $product, ImageService $imageService)
    {
        try {
            if ($request->has('image')) {
                if($imageService->imageExist($product->image)){
                    $imageService->deleteImage($product->image);
                    if($request->has('image')){
                        $path = $imageService->saveImage($request->file('image'));
                    }
                } else {
                    $path = $imageService->saveImage($request->file('image'));
                }
            }


            $product->update([
                'status' => $request->status,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path ?? $product->image,
                'price' => $request->price,
                'indiscount' => $request->indiscount,
                'discount' => $request->discount ?? 0,
                'content' => $request->content,
                'code' => $request->code,
                'stock' => $request->stock
            ]);

            return redirect()->back()->with('success','Producto actualizado exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');

        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->back()->with('success','Producto eliminado exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
        return redirect()->back()->with('success','Producto restaurado exitosamente');

    }

    public function gallery(Product $product,ProductGalleryRequest $request,ImageService $imageService)
    {
        try {
            if($request->has('product_image')){
                $path = $imageService->saveImage($request->file('product_image'));
            }

            ProductGallery::create([
                'image' => $path,
                'product_id' => $product->id
            ]);

            return redirect()->back()->with('success','Imagen agregada exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function inventory(Product $product): View
    {
        $inventory = Inventory::where('product_id',$product->id)->get();
        return view('admin.products.inventory',compact('product','inventory'));
    }
}
