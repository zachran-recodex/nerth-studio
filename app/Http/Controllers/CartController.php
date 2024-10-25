<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        return view('carts.index', compact('cartItems'));
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
    public function store($productId)
    {
        $user = Auth::user();

        $existingCartItem = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();

        if ($existingCartItem) {
            return redirect()->route('carts.index');
        }

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $productId;
        $cart->quantity = 1; // Default quantity to 1, you can adjust as needed
        $cart->save();

        return redirect()->route('carts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cartItem = Cart::findOrFail($id);
        return view('carts.show', compact('cartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cartItem = Cart::findOrFail($id);
        return view('carts.edit', compact('cartItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->route('carts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('carts.index');
    }
}
