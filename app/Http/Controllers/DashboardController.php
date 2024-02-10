<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard-page.index',[
            'items'=>Item::all()
        ]);
    }

    public function test(){
        return 'test';
    }
}
