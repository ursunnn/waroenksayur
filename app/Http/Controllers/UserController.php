<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('profile',['user'=>$user]);
    }

    public function update(){
        $user = User::find(Auth::user()->id);
        return view('update_profile',['user'=>$user]);
     }

    public function edit(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email,'.Auth::user()->id,
            'password'=>'required|min:8',
            'confirm'=>'required|same:password',
            'address'=>'required|min:15',
            'phone'=>'required|digits:11'
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect()->route('profile')->with('alert','Your Account has been Updated');
    }


    public function index_login(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:20',
        ]);

        if(!Auth::attempt($credential,$request->input('remember'))){
            return redirect()->back()->withErrors('invalid email or password');
        }
        $user = Auth::user();
        return redirect()->route('home');
    }

    public function index_register(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'confirm'=>'required|same:password',
            'address'=>'required|min:15',
            'phone'=>'required|digits:11',
            'terms'=> 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Member';
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->save();
        return redirect()->route('home')->with(['alert'=>'Your Account has been created']);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function addToCart($id){
        if(!Auth::check()){
            return redirect()->route('index_login')->with('alert', 'please sign in to add to cart!');
        }
        $carts = Cart::where('user_id','=',Auth::user()->id)->get();
        $product = Product::find($id);
        // dd($product);
        foreach ($carts as $item) {
            // dd($item);
            if($item->product_id == $id){
                return redirect()->back()->with('alert','Product Already in Cart');
            }
        }

        $cart = new Cart();
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $id;
        $cart->quantity = 1;
        $cart->subtotal = $product->price;
        $cart->save();

        return redirect()->back()->with('alert','Product added to Cart');
    }

    public function updateCart($id, Request $request){
        $cart = Cart::find($id);
        // dd($cart);
        $product = Product::find($cart->product_id);
        // dd($product);

        $request->validate([
            'quantity'=>'required|integer|min:0|max:'.$product->stock
        ]);

        if($request->quantity == 0){
            $cart->delete();
            return redirect()->back()->with('alert','Product has been removed');
        }else{
            $cart->quantity = $request->input('quantity');
            $cart->subtotal = $cart->quantity* $product->price;
        }
        $cart->save();
        return redirect()->back()->with('alert','Product Has been Updated');
    }
    public function deleteItem($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('alert','Product has been removed');
    }

    public function checkout($passcode, Request $request){
        $request->validate([
            'passcode'=>'required'
            // 'passcode'=>'required|same:'.$passcode
        ]);
        if($request->input('passcode')!=$passcode){
            return redirect()->back()->with('error','invalid Passcode');
        }

        $header = Cart::where('user_id','=',Auth::user()->id)->get();
        // dd($header);
        $flag = false;
        foreach ($header as $item) {
            $product = Product::find($item->product_id);
            if($product->stock < $item->quantity){
                $item->delete();
                $flag = true;
            }
        }
        if($flag==true)
        return redirect()->back()->with('alert', 'Some Product stock is not enough and has been removed');

        foreach ($header as $item) {
            $transaction = new Rent();
            $product = Product::find($item->product_id);
            $product->stock = $product->stock - $item->quantity;
            $transaction->user_id = $item->user_id;
            $transaction->product_id = $item->product_id;
            $transaction->quantity = $item->quantity;
            $transaction->subtotal = $item->subtotal;
            $transaction->transaction_date = Carbon::now();
            $transaction->save();
            $product->save();
            $item->delete();
        }
        return redirect()->route('home')->with('alert','Transaction Success! You will receive our product soon! thank you for shopping with us!');
    }

}
