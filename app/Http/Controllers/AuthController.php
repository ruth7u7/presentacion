<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function viewregister(){
        return view('register');
    }

    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required', 
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login');
    }

    public function viewlogin(Request $request){
        Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if(!Auth::attempt($request->only('email', 'password'), $request->boolean('remember')))
        {
            throw ValidationException::withMessages([
                'email'=> trans('auth.failed')
            ]);
        }
        $request->session()->regenerate();

        if(auth()->user()->type == 'admin'){
            return redirect()->route('admin/home');
        } else {
            return redirect()->route('home');
        }
        return redirect()->route('dashboard');
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function profile()
    {
        return view('userprofile');
    }
}
