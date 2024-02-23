<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class DashboardCartController extends Controller
{
    public function index(){
        return view('dashboard-page.cart.index',[
            'items' => Item::all()
        ]);
    }
}
