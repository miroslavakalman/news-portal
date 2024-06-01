<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NewUser; 

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::guard('web')->attempt($credentials)) { 
            return redirect()->intended('/');
        }

        return back()->withErrors(['login' => 'Неверное имя пользователя или пароль.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}


