<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stripe = Cashier::stripe();
        $products = $stripe->products->all()->data; // here you get all products
        $prices   = $stripe->prices->all()->data;
        foreach ($products as $k => $product) {
            $data[] = ['product'=> $product, 'price'=> $prices[$k]];
        }
        return view("pages.cashier.subscription", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function charge(Request $request, String $product, $price)
    {
        $user = $request->session()->get('userSession');
        $user = User::findOrfail(session('loginUserId'));
        // dd($user, $user->createSetupIntent());
        return view('pages.cashier.payment', [
            'user' => $user,
            'intent' => $user->createSetupIntent(),
            'product' => $product,
            'price' => $price
        ]);
    }
    public function processPayment(Request $request, String $product, $price)
    {
        // $user = Auth::user();
        $user = User::findOrfail(session('loginUserId'));
        // dd($user);
        $paymentMethod = $request->input('payment_method');
        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        // dd($user->toArray(), $request->all(), $product, $price);
        try {
            $user->updateStripeCustomer();
            // card number: 378282246310005
            $user->charge($price * 100, $paymentMethod);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment  $e) {
            return back()->with('error', 'Error creating subscription. ' . $e->getMessage());
            // return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        return redirect()->route('subscription.index')->with('success','Subscription Payment successful.');
    }



    /**
     * END::CLASS
     */
}
