<?php

namespace App\Http\Controllers;

use App\Admin;

class AdminsController extends Controller
{

    public function index()
    {
        $admins = Admin::all();

        return view('admins.index',compact('admins'));
    }
    public function create()
    {
        return view('admins.create');
    }

    public function store()
    {
        $admin = Admin::create(array_merge(request()->only(['name','privileges','address','email']) , ['password' => bcrypt(request('password'))]));

        return redirect()->route('admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return back();
    }


}
