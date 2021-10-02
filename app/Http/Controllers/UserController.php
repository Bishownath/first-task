<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\User\UpdateRequest;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('user.index')->with([
            'users' => $users,
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

        Alert::success('Success', 'Successfully Stored !!');
        return redirect()->route('user.index');
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

        Alert::success('Success', 'User Updated Successfully !!');
        return redirect()->route('user.index');
    }


    public function destroy(User $user)
    {
        // if ($user->delete()) {
        Alert::warning('Are you sure want to delete?', 'Delete');
        if (!$user->delete()) {
            Alert::warning('Cannot find user', 'Cannot find.');
            return redirect()->back();
        } else {
            Alert::success('Success', 'Successfully Deleted.');
            $imagePath = ("images/user/" . $user->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $user->delete();
        }
        // }


        Alert::success('Success', 'Deleted Successfully !!');

        return redirect()->route('user.index');
    }
}
