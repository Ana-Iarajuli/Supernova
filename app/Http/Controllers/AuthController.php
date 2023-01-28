<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function loginPage(Request $request) {
        return view("auth.login");
    }


    public function login(Request $request) {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        $user = User::where(["email" => $credentials["email"]])->first();
        if ($user) {
            if (Hash::check($credentials["password"], $user->password)) {
                Auth::login($user);
                return redirect(route("user.index"));
            } else {
                return back()->withError(["password" => "Password is incorrect"]);
            }
        }
        return back()->withError(["email" => "Invalid Email Address"]);
    }


    public function registerPage(Request $request) {
        return view("auth.register");
    }


    public function register(Request $request) {
        $credentials = $request->validate([
            "email" => "required|email",
            "name" => "required",
            "password" => "required|confirmed"
        ]);
        $credentials["password"] = Hash::make($credentials["password"]);
        User::create($credentials);
        return redirect(route("login")); 
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return redirect("/");
    }   
}
