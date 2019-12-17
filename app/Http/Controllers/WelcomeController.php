<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Product;

class WelcomeController extends Controller
{
    public function index()
    {
    	$products = Product::all()->map(function($product) {
    		return [
                'id' => $product->id,
    			'name' => $product->name,
    			'description' => strip_tags($product->description),
    			'price' => intval($product->price),
    			'image' => $product->image,
    		];
    	});

    	return Inertia::render('Welcome', ['products' => $products]);
    }
}
