<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{

    public function login(Request $request)
    {



        $credenciales = [
            "usuario" => $request->usuario,
            "password" => $request->password
        ];

        if (Auth::attempt($credenciales)) {

            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }
}
