<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return view('user.index')->with([
            'user' => $user,
        ]);
    }


    public function create()
    {
        return view('user.create');
    }


    public function store(StoreRequest $request)
    {
        $user = User::create($request->data());

        return redirect()->route('user.index')->with([
            'user' => $user,
            'success' => 'Added Successfully !!',
        ]);
    }


    public function show(User $user)
    {
        return view('user.show')->with([
            'user' => $user,
        ]);
    }


    public function edit(User $user)
    {
        // dd($user);
        return view('user.edit')->with([
            'user' => $user,
        ]);
    }


    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->data());
        return redirect()->route('user.index')->with([
            'success' => 'User Updated Successfully !!',
        ]);
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Deleted Successfully !!');
    }
}
