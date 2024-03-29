<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalInvoice = Invoice::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        return view('home',compact('totalInvoice','totalCategories','totalProducts'));
    }
}
