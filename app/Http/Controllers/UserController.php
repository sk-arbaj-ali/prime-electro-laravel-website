<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(Request $req)
    {
        if($req->isMethod('get'))
        {
            return view('signup-for-user');
        }
        $data = $req->validate([
            'email'=>'required|email',
            'name'=>'required',
            'password'=>'required|min:8'
        ]);

        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('home');
    }
    public function signup_for_seller(Request $req)
    {
        if($req->isMethod('get'))
        {
            return view('signup-for-seller');
        }
        $data = $req->validate([
            'email'=>'required|email',
            'name'=>'required',
            'password'=>'required|min:8'
        ]);
        
        $user = new User();
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->is_seller = true;
        $user->save();
        
        Auth::login($user);
        return redirect()->route('home');
    }
    public function login(Request $req)
    {
        if($req->isMethod('get'))
        {
            return view('login');
        }
        $data = $req->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($data))
        {
            return redirect()->route('home');
        }
        return redirect()->route('login-form')->withErrors(['status'=>'invalid credentials']);
    }
    public function logout(Request $req)
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function handle_address(Request $req)
    {
        if($req->isMethod('get'))
        {
            return view('add-new-address');
        }

        $user = Auth::user();
        $address = new Address();
        $address->city = $req->input('city');
        $address->pincode = $req->input('pincode');
        $address->phone = $req->input('phone');
        $address->address = $req->input('address');
        $address->user_id = $user->id;
        $address->save();

        if($address)
        {
            return redirect()->route('show-address-form')->with('success', true);
        }
        return redirect()->route('show-address-form')->with('success', false);

    }
    public function show_all_addresses()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('show-all-addresses', ['addresses'=>$addresses]);
    }
    public function remove_address(Request $req)
    {
        $user = Auth::user();
        $address = $user->addresses()->where('id', $req->input('address_id'))->firstOrFail();
        $address->delete();
        return redirect()->route('show-all-addresses');
    }
}
