<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        if (!empty($user)){
            session(['user' => $user]);
            return redirect('home');
        }
            

        return back()->with('alert', 'Username or Password Incorrect');
    }

    public function logout(){
        session()->flush();
        return redirect('login');
    }
}
