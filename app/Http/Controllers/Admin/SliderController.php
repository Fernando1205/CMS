<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function __invoke()
    {
        return view('admin.slider.index');
    }
}
