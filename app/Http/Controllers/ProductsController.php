<?php

namespace App\Http\Controllers;


use App\Offer;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $product = Product::create(request()->only(['name','category','description','price']));

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    public function update(Product $product)
    {
        $product->update(request()->only(['name','price','description','category']));

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }
}
