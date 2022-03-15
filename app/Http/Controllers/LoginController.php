<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //


    public function loginView()
    {
        return view('signin');
    }
    public function login(Request $request)
    {
        // dd($request);
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            return redirect('/');
        } else {
            return redirect()->route('/login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
}
