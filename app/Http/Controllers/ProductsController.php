<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Redirect;
use Session;

class ProductsController extends Controller
{
    public function getProducts(){
    	$products = Product::all();

    	return view('products')->with('products', $products);
    }

    public function addItems(Request $request, $id){

    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	$request->session()->put('cart', $cart);

    	return redirect('/products');
    }

	public function getCart(Request $request){

		if (!Session::has('cart')){
			return view('cart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);

		return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

	}

	public function getRemoveItem(Request $request, $id){
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);

		if (count($cart->items) > 0){
			$request->session()->put('cart', $cart);
		}else{
			$request->session()->forget('cart', $cart);
		}

		return Redirect::back();
	}
}
