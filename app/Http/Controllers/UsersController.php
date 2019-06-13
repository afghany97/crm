<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests\UserUpdate;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $admins = Admin::all();

        return view('users.create', compact('admins'));
    }

    public function store()
    {
        $user = User::create(array_merge(request()->only(['name', 'address', 'email', 'type', 'admin_id']), ['password' => bcrypt(request('password'))]));

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $admins = Admin::all();

        return view('users.edit', compact('user', 'admins'));
    }

    public function update(UserUpdate $userUpdate, User $user)
    {
        $user->update(array_merge(request()->only(['admin_id', 'type', 'address', 'name', 'email']), ['password' => bcrypt(request('password'))]));

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
