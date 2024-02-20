<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardHistoryController extends Controller
{
    public function index(){
        return view('dashboard-page.history.index');
    }
}
