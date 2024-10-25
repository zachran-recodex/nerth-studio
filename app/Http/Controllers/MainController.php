<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('main.about');
    }

    /**
     * Display the product page based on slug.
     */
    public function product($slug)
    {
        // Mengambil produk berdasarkan slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // Menampilkan tampilan dengan data produk
        return view('main.product', compact('product'));
    }

    /**
     * Display the cart page.
     */
    public function cart()
    {
        return view('main.cart');
    }

    /**
     * Add item to cart.
     */
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->title,
                'quantity' => 1,
                'price' => $product->price,
                'size' => $request->size,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Update item quantity in cart.
     */
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove item from cart.
     */
    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
