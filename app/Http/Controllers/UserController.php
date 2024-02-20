<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $credentials = $request->validate([
            'username'=>'required|exists:users,username',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/');
        }
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/');
        return response()->json(['redirect' => route('landing-page')]);

    }
}
