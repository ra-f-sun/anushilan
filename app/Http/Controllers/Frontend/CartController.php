<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'package_id' => 'sometimes|exists:packages,id',
        ]);
        if (Auth::check()) {
            $userId = Auth::id();
            $categoryId = $request->input('category_id');
            $packageId = $request->input('package_id');
            if ($categoryId) {
                Cart::create([
                    'user_id' => $userId,
                    'category_id' => $categoryId,
                    'package_id' => 0,
                ]);

                return redirect()->route('cart.view')->with('success', 'Item added to cart!');
            } elseif ($packageId) {
                Cart::create([
                    'user_id' => $userId,
                    'package_id' => $packageId,
                    'category_id' => 0,
                ]);

                return redirect()->route('cart.view')->with('success', 'Package added to cart!');
            }
        } else {
            return redirect()->back()->with('error', 'Please login first to add items to your cart');
        }
    }

    public function cart()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Cart::with('categories', 'packages')->where('user_id', $userId)->get();
            if ($cartItems->isEmpty()) {
                return redirect()->route('home')->with('error', 'Your cart is empty. Start shopping!');
            }
            return view('frontend.cart', compact('cartItems'));
        } else {
            return redirect()->route('login')->with('error', 'You need to be logged in to view your cart.');
        }
    }


    public function removeItem($id)
    {
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
            session()->flash('success', 'Item removed from cart successfully!');
        } else {
            session()->flash('error', 'Item not found in cart!');
        }
        return redirect()->back();
    }
}
