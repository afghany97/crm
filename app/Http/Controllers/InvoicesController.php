<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\User;

class InvoicesController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index',compact('invoices'));
    }

    public function create()
    {
        $users = User::all();

        $products = Product::all();

        return view('invoices.create',compact('users','products'));
    }

    public function store()
    {
        $invoice = Invoice::create(request()->only(['total_cost','product_id','user_id']));

        return redirect()->route('invoices.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return back();
    }
}
