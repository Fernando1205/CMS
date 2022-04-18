<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __invoke()
    {
        return view('admin.slider.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
