<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
  public function create()
  {
    return view('auth.login');
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      "email" => ['required', 'email'],
      "password" => ['required', Password::min(3)],
    ]);

    if (!Auth::attempt($attributes)) {
      throw ValidationException::withMessages([
        'wrong_credentials' => Lang::get('auth.failed')
      ]);
    }

    request()->session()->regenerate();

    return redirect('/')->with('notification', 'Bem vindo de volta!');
  }

  public function destroy()
  {
    Auth::logout();

    return redirect('/login')->with('notification', 'Sua conta foi desconectada com sucesso!');
  }
}
