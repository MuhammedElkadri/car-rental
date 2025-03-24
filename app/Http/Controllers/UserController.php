<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('car_rent.pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('car_rent.pages.user.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('car_rent.pages.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('car_rent.pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}