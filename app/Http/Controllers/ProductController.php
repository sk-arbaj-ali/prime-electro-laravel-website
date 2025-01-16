<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function add_new_product(Request $req)
    {
        if($req->isMethod('get'))
        {
            $categories = Category::all();
            return view('add-product-page',['categories'=>$categories]);
        }

        $product = new Product();
        $product->product_name = $req->input('product_name');
        $product->product_price = $req->input('product_price');
        $product->available_stock = $req->input('available_stock');
        $product->description = $req->input('description');
        $product->user_id = Auth::user()->id;
        $product->category_id = $req->input('category');

        // store the file
        $path = $req->file('image')->store('images', 'public');
        $product->image_path = $path;
        $res = $product->save();
        if($res)
        {
            return redirect()->route('product-form')->with('success', true);
        }
        return redirect()->route('product-form')->with('success', false);
    }

    public function home(Request $req)
    {
        return view('Home', [
            'laptops'=>Category::whereLike('name','laptop%')->first()->products()->limit(6)->get(),
            'smartphones'=>Category::whereLike('name','smartphone%')->first()->products()->limit(6)->get(),
            'desktops'=>Category::whereLike('name','desktop%')->first()->products()->limit(6)->get(),
        ]);
    }
    public function category(Request $req)
    {
        if($req->isMethod('get'))
        {
            return view('add-category');
        }

        $category = new Category();
        $category->name = $req->input('category_name');
        $category->save();
        return redirect()->route('category-form')->with('success', false);
    }
    public function show_products(Request $req, string $category)
    {
        $category = Category::whereLike('name', $category . '%')->first();
        return view('show-products', [
            'category'=>$category,
            'products'=>$category->products()->paginate(20),
        ]);
    }
    public function search_product(Request $req)
    {
        $query = $req->query('search');
        $products = Product::whereLike('product_name', '%' .$query . '%')->paginate(20);
        return view('show-searched-products', [
            'products'=>$products
        ]);
    }

    public function show_specific_product(Request $req, string $id)
    {
        $product = Product::find($id);
        return view('product-page', ['product'=>$product]);
    }
    public function handle_cart(Request $req)
    {
        $user = Auth::user();
        if($req->isMethod('get'))
        {
            $cart = Cart::where('user_id', $user->id)->pluck('product_id');
            return view('shopping-cart', [
                'products'=>Product::whereIn('id',$cart)->get(),
                'exists'=>Product::whereIn('id',$cart)->exists(),
                'total_price'=>Product::whereIn('id',$cart)->sum('product_price'),
            ]);
        }
        try{
            $cart = Cart::where('user_id', $user->id)->where('product_id', $req->input('product_id'))->firstOrFail();
            return redirect()->route('user-cart-details-get')->with('status','Product already in cart.');
        }
        catch(ModelNotFoundException)
        {
            $cart = new Cart;
            $cart->user_id = $user->id;
            $cart->product_id = $req->input('product_id');
            $cart->save();
        }
        return redirect()->route('user-cart-details-get');
    }
    public function remove_product_from_cart(Request $req)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('product_id', $req->input('product_id'))->first();
        $cart->delete();
        return redirect()->route('user-cart-details-get')->with('status','Product removed from cart.');
    }

    public function show_products_for_seller()
    {
        $user = Auth::user();
        $products = $user->products;
        return view('show-products-added-by-seller', ['products'=>$products]);
    }

    public function edit_product_data(Request $req, string $product_id)
    {
        $user = Auth::user();
        
        $categories = Category::all();
        $product = $user->products()->where('id', $product_id)->firstOrFail();
        return view('edit-product-page', ['product'=>$product, 'categories'=>$categories]);   
    }
    public function submit_product_data(Request $req)
    {
        $user = Auth::user();
        $product = Product::findOrFail($req->input('product_id'));
        $product->product_name = $req->input('product_name');
        $product->product_price = $req->input('product_price');
        $product->available_stock = $req->input('available_stock');
        $product->description = $req->input('description');
        $product->category_id = $req->input('category');
        @unlink(asset('/storage/' . $product->image_path));

        $path = $req->file('image')->store('images', 'public');
        $product->image_path = $path;
        $res = $product->save();
        if($res)
        {
            return redirect()->route('show-seller-products')->with('success', true);
        }
        return redirect()->route('show-seller-products')->with('success', false);
    }

    public function delete_product_data(Request $req)
    {
        $user = Auth::user();
        $product = $user->products()->where('id', $req->input('product_id'))->firstOrFail();
        $product->delete();
        return redirect()->route('show-seller-products')->with('deleted', true);
    }
}
