<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function show(Request $request){
        $cart = $request->session()->get('cart');
        return view('cart.show', compact('cart'));
    }

    public function add(Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        $cart->add($product);
        $request->session()->put('cart', $cart);
    }

    public function remove(Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        $cart->remove($product);
        $request->session()->put('cart', $cart);
    }

    public function removeAll(Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        $cart->removeAll($product);
        $request->session()->put('cart', $cart);
    }

    public function operate(String $sOperation, Product $product, Request $request){
        $cart = new Cart($request->session()->get('cart'));
        switch($sOperation){
            case "add":{
                $cart->add($product, $request);
                break;
            }
            case "remove":{
                $cart->remove($product, $request);
                break;
            }
            case "removeAll":{
                $cart->removeAll($product, $request);
                break;
            }
        }
        $request->session()->put('cart', $cart);
        return view('cart.show', compact('cart'));
    }
}
