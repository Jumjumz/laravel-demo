<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{  
    public function register(Request $request) {
        $incomingData = $request->validate([
            'name' => ['required', 'min:3', 'max:50', Rule::unique('users', 'name')],
            'email' => ['required', 'min:10', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:500'],
        ]);

        $incomingData['password'] = bcrypt($incomingData['password']);
        $user = User::create($incomingData);

        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request) {
        $passedData = $request->validate([
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        if (auth()->attempt(['email' => $passedData['login_email'], 'password' => $passedData['login_password']])){
            $request->session()->regenerate();
        }

        return redirect("/");
    }
    
    //
}
