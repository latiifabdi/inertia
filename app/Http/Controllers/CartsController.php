<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartsController extends Controller
{
    public function index()
    {

        $items = [];

        \Cart::getContent()->each(function($item) use (&$items) {
            $items[] = $item;
        });


        return Inertia::render('Cart', [
            'products' => $items,
            'subTotal' => \Cart::getSubTotal(),
            'total' => \Cart::getTotal()
        ]);
    }

    public function store(Product $product)
    {
        $price = number_format($product->price / 100, 2);

        \Cart::add($product->id, $product->name, $price, 1, ['image' => asset($product->image)]);

        return redirect('/carts');
    }
}
