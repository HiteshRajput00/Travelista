<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function LoginPage()
    {
        return view('forms.login');
    }

    public function RegisterPage()
    {
        return view('forms.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'mobile_number' => 'required|numeric|unique:users,mobile_number',
            'password' =>
                ['required',
                    'string',
                    'min:7'
                ],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->password = $request->password;
        $user->save();

        if ($user) {
            Auth::login($user);
            if (Auth::user()->role === 'admin') {

            } else {
                return redirect('/');
            }
        } else {
            return redirect()->back()->with('error');
        }
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'email' => 'required',
            'password' => 'required',
        ]);

        $credent = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credent, $remember)) {
            if (Auth::user()->role === 'admin') {

                return redirect('/admin-dashboard')->with('success', 'welcome hitesh');

            } else {

                return redirect('/');
            }
        } else {
            return back()->with('msg', 'please enter vaild details');
        }
    }

    Public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
