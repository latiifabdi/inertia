<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Inertia\Inertia;

class CollectionController extends Controller
{
    public function index()
    {
    	$products = Product::all()->map(function($product) {
    		return [
                'id' => $product->id,
    			'name' => $product->name,
    			'description' => strip_tags($product->description),
    			'price' => intval($product->price),
    			'image' => asset($product->image),
    		];
    	});

    	return Inertia::render('Products', ['products' => $products]);
    }
}
