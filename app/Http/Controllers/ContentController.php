<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::where('visible',1)->get();
        $categories = Category::all();
        return view('home',compact('categories','sliders'));
    }
}
