<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        return $this->show();
    }

    public function add($id)
    {
if (!Auth::check()) {
    return redirect()->route('products.login')->withErrors([ 'auth' => 'Debes iniciar sesión para agregar al carrito.' ]);
    }

    $product = Product::findOrFail($id);

    $cart = Cart::firstOrCreate([ 'user_id' => Auth::id() ]);

    $cartItem = $cart->items()->where('product_id', $id)->first();
    if ($cartItem) { $cartItem->qty += 1; $cartItem->save(); }
    else {
    $cart->items()->create([ 'product_id' => $id, 'qty' => 1 ]);
    }

   return redirect()->route('addtocard');
    }


    public function update(Request $request, $productId)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart) {
            $cartItem = $cart->items()->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->qty = $request->input('qty', 1);
                $cartItem->save();
            }
        }

        return redirect()->route('cart.show');
    }


    public function show()
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.product')->first();
        return view('products.addtocard', compact('cart'));
    }


    public function remove($productId)
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart) {
            $cart->items()->where('product_id', $productId)->delete();
        }

        return view('products.addtocard', compact('cart'));
    }

}


