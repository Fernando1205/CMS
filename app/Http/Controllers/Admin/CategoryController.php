<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index($module): View
    {
        $cats = Category::where('module', $module)->orderBy('name','asc')->get();
        return view('admin.categories.index', compact('cats'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        try {
            Category::create([
                'module' => $request->module,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'icono'=> e($request->icono)
            ]);
            return redirect()->back()->with('success','Categoría creada exitosamente');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category): View
    {
        return view('admin.categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, Category $category):RedirectResponse
    {
        try {
            $category->update($request->all());
            return redirect()->back()->with('success','Categoría actualizada exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->back()->with('success','Categoría eliminada exitosamente');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }
}
