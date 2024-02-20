<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCartController extends Controller
{
    public function index(){
        return view('dashboard-page.cart.index',[

        ]);
    }
}
