<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Product;
use App\User;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offer::all();

        return view('offers.index',compact('offers'));
    }
    public function create()
    {
        $products = Product::all();

        $users = User::all();

        return view('offers.create',compact('products','users'));
    }

    public function store()
    {
        $offer = Offer::create(request()->only(['name','user_id','product_id','description']));

        return redirect()->route('offers.index');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return back();
    }
}
