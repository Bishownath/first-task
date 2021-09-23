<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_admin');
    }
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
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $inputfile = $request->file('image');
            $extension = $inputfile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $inputfile->move('images/user', $filename);
            if ($filename) {
                $user->image = $filename;
            }
        }
        $user->save();
        return redirect()->route('user.index')
            ->with([
                'success' => 'Successfully Stored !!'
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
        return view('user.edit')->with([
            'user' => $user,
        ]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        if ($request->hasFile('image') && $request->image != '') {
            $imagePath = ("images/user/" . $user->image);

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            $inputfile = $request->file('image');
            $filename = time() . Str::random(20) . '.' . $inputfile->getClientOriginalExtension();
            $inputfile->move('images/user', $filename);

            $user->image = $filename;
            // $request->merge(['image' => $inputfile]);
            // $user->update(['image' => $filename]);
            // $user->image = $filename;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')
            ->with([
                'success' => 'User Updated Successfully !!',
            ]);
    }


    public function destroy(User $user)
    {
        $imagePath = ("images/user/" . $user->image);
        unlink($imagePath);
        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'Deleted Successfully !!');
    }
}
