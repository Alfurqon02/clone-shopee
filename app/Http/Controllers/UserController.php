<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(){
        echo "Welcome";
    }

    public function register(Request $request){
        // dd($request);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|string|min:3|max:32|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8',

        ]);
        // dd($validatedData);

        $validatedData['password'] = bcrypt($validatedData['password']);
        // // $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/');

    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            // Reset login attempts count on successful login
            $request->session()->put('login_attempts', 0);
            $request->session()->regenerate();
            return redirect('/');
        } else {
            // Increment login attempts count on failed login
            $loginAttempts = $request->session()->get('login_attempts', 0) + 1;
            $request->session()->put('login_attempts', $loginAttempts);

            // Validate captcha if login attempts >= 3
            if($loginAttempts >= 3) {
                $request->validate([
                    'g-recaptcha-response' => 'recaptcha',
                ]);
            }
            return redirect('/')->with('error', 'Username or Password invalid');
        }
    }



    // public function login(Request $request){
    //     $credentials = $request->validate([
    //         'username'=>'required|exists:users,username',
    //         'password'=>'required',
    //         'g-recaptcha-response' => 'recaptcha',
    //     ]);

    //     $credentials = $request->only('username', 'password');
    //     if(Auth::attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect('/');
    //     }
    // }

    // public function login(Request $request){
    //     $credentials = $request->only('username', 'password');

    //     if(Auth::attempt($credentials)){
    //         User::where('id', Auth::user()->id)->update(['login_attempts' => 0]);;
    //         $request->session()->regenerate();
    //         return redirect('/');
    //     } else {
    //         // Increment failed attempts count on failed login
    //         $user = User::where('username', $request->username)->first();
    //         if($user) {
    //             $user->increment('login_attempts');
    //         }
    //     }

    //     // Validate captcha if failed attempts >= 3
    //     if($user && $user->login_attemps >= 3) {
    //         $request->validate([
    //             'g-recaptcha-response' => 'recaptcha',
    //         ]);
    //     }

    //     return redirect('/');
    // }


    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/');
        return response()->json(['redirect' => route('landing-page')]);

    }
}
