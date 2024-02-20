<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsAccountController extends Controller
{
    public function index(){
        return view('settings-page.account.index');
    }
}
