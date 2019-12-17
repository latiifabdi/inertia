<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return Inertia::render('Product', ['product' => $product]);
    }
}
