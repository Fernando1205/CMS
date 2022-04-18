<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        return view('home',compact('categories'));
    }
}
