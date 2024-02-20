<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function index(){
        return view('menu-admin.user-settings.account.index');
    }
}
