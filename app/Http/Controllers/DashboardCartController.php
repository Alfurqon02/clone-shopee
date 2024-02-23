<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardCartController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $item = DB::table('items')
                ->join('users_items', 'items.id', '=', 'users_items.item_id')
                ->join('users', 'users_items.user_id', '=', 'users.id')
                ->where('users_items.user_id', '=', $user_id)
                ->select('items.name AS name',
                        'items.image AS image',
                        'items.price AS price',
                        'users_items.quantity AS quantity')
                ->get();
        // dd($item);
        return view('dashboard-page.cart.index',[
            'items' => $item
        ]);
    }

    public function store(Request $request, Item $item){
        $user_id = Auth::id();
        $amount = $request->quantity;
        $item->users()->attach($user_id, ['quantity' => $amount]);

        return redirect()->back()->with('success', 'Item added to Cart!');

    }
}
