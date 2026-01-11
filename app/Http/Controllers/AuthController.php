<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('products.login');
    }

    public function showSignupForm()
    {
        return view('products.signup');
    }


    public function signup(Request $request)
    {

  $validated = $request->validate([ 'email' => ['required', 'email'],
  'password' => ['required'], ]);

$user = User::create([ 'email' => $validated['email'],
  'password' => Hash::make($validated['password']),
]);

  Auth::login($user);
  $request->session()->regenerate();

return redirect()->route('products.login');
    }

    public function login(Request $request)
    {
        // ✅ Validación
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->route('products.index');
 }
 return back()->withErrors([ 'email' => 'Los datos ingresados no son válidos.', ])->onlyInput('email');
    }
}

