<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsIncomeController extends Controller
{
    public function index(){
        return view('settings-page.income.index');
    }
}
