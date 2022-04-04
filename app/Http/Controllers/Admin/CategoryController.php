<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index($module): View
    {
        $cats = Category::where('module', $module)->orderBy('name','asc')->get();
        return view('admin.categories.index', compact('cats'));
    }

    public function create()
    {
        //
    }

    public function store(CategoryRequest $request)
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
            dd($th->getMessage());
            return redirect()->back()->with('error','Ha ocurrido un error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
