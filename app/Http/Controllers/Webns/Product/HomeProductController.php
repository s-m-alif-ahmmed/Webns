<?php

namespace App\Http\Controllers\Webns\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function index()
    {
        return view('webns.pages.all_product.index');
    }
    public function productSingle()
    {
        return view('webns.pages.all_product.detail');
    }
}
