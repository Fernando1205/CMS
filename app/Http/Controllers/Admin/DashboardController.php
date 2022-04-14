<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','IsAdmin']);
    }

    public function dashboard()
    {
        $users = User::count();
        $products = Product::where('status',1)->count();
        return view('admin.dashboard', compact('users','products'));
    }
}
