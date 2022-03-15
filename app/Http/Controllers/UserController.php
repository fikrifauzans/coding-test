<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show()
    {
        $users = User::latest()->get();

        return view('author', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->name);
        $user->role = 'author';
        $user->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        User::find($request['id'])->delete();
        return redirect()->back();
    }

    public function updateForm(User $user)
    {
        return view('update', compact('user'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($request['id']);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->name);
        $user->role = 'author';
        $user->update();

        return redirect()->back();
    }
}
