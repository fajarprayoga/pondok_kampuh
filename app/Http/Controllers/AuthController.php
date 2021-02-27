<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::user())){
            if(Auth::user()->roles == 'ADMIN'){
                return redirect('dashboard');
            }
            return redirect('home');
        }
        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->status == 'ACTIVE'){
                $request->session()->regenerate();
                if(Auth::user()->roles == 'ADMIN'){
                    return redirect()->intended('dashboard');
                }else{
                    return redirect()->intended('home');
                }
            }else{
                Auth::logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register()
    {
        if(!empty(Auth::user())){
            if(Auth::user()->roles == 'ADMIN'){
                return redirect('dashboard');
            }
            return redirect('home');
        }
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'phone' => 'required|min:10|max:13',
            // 'image' => 'required',
            'address' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,
            // 'image' => $image_path
        ]);

        if($user){
            event(new Registered($user));
            return redirect('login')->with('success', 'User success Register');
        }else{
            return redirect()->back();
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
