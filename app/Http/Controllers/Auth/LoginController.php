<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'waiting';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Check the user's class and redirect accordingly
        if ($user->kelas == 'none') {
            return redirect()->route('waiting');
        } else {
            return redirect()->route('home');
        }
    }

    public function waiting()
    {
        return view('auth.waiting');
    }
}
