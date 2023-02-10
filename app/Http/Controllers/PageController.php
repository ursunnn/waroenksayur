<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Rent;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function aboutus()
    {
        return view('aboutUs');
    }
    public function getMusic(){
        $products= Product::paginate(12);
        return view('productList', ['products'=>$products]);
    }

    public function details($id){
        $product = Product::find($id);
        return view('product_detail',['product'=>$product]);
    }

    public function search(Request $request) {
        $query = $request->search;
        $products = Product::where('title', 'like', '%'.$query.'%')->orWhere('description', 'like', '%'.$query.'%')->paginate(12)->withQueryString();
        return view('productList', compact('products', 'query'));
    }

    public function cart(){

        $header = Cart::where('user_id','=',Auth::user()->id)->get();
        $user = User::with('cart')->where('id','=',Auth::user()->id)->get();
        $cart = $user[0]->cart;
        // dd($cart);

        return view('cart',['cartItems'=>$cart, 'header'=>$header]);
    }

    public function index_checkout(){

        $header = Cart::where('user_id','=',Auth::user()->id)->get();
        $user = User::with('cart')->where('id','=',Auth::user()->id)->get();
        $cart = $user[0]->cart;
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $passcode = substr(str_shuffle(str_repeat($pool, 5)), 0, 6);

        // dd($cart);

        return view('checkout',['cartItems'=>$cart, 'header'=>$header, 'passcode'=>$passcode]);
    }

    public function transaction_history(){
        $header = Rent::where('user_id','=',Auth::user()->id)->orderBy('transaction_date', 'desc')->get();
        $user = User::with('rent')->where('id','=',Auth::user()->id)->get();
        $transaction = $user[0]->rent;
        // dd($transaction);
        return view('transaction',['history'=>$transaction, 'header'=>$header]);
    }

}
