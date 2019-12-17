<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        return Inertia::render('Checkout', [
            'subTotal' => \Cart::getSubTotal(),
            'total' => \Cart::getTotal()
        ]);
    }

    public function store()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $charge = Charge::create([
            'amount' => \Cart::getTotal() * 100,
            'currency' => 'usd',
            'source' => request('token'),
        ]);

        Customer::create([
            'name' => request('name'),
            'address' => request('address'),
            'phoneNumber' => request('phoneNumber'),
            'country' => request('country'),
            'city' => request('city'),
            'email' => request('email'),
        ]);

        Order::create([
            'email' => request('email'),
            'amount' => \Cart::getTotal(),
        ]);

        \Cart::clear();

        return redirect('/');
    }
}
