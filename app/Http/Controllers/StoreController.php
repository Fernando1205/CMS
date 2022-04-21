<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('store.index',compact('categories'));
    }
}
