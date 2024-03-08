<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function category(){}

    public function item(Item $item){

        $seller = DB::table('users')
                            ->where('users.id', '=', $item->user_id)
                            ->select('name')
                            ->get();
        $seller = json_encode($seller[0]->name);
        $seller = trim($seller, '"');
        return view ('main-page.item',[
            'item'=>$item,
            'seller'=> $seller,
        ]);
    }

    public function buy(Request $request, Item $item){
        // dd($request);
        $validateData = Validator::make($request->all(), [
            'receiver' => 'required',
            'address' => 'required',
            'shipment_id' => 'required',
            'quantity' => 'required',
        ]);
        if ($validateData->fails()) {
            return redirect()->back()->withErrors($validateData)->withInput();
        }
        $item_id = $item->id;
        $user_id= Auth::user()->id;
        $total_price = $request->quantity * $item->price;

        Order::create([
            'item_id' => $item_id,
            'user_id' => $user_id,
            'receiver' => $request->receiver,
            'address' => $request->address,
            'shipment_id' => $request->shipment_id,
            'quantity' => $request->quantity,
            'total_price' => $total_price
        ]);

        return redirect()->route('item', $item->slug)->with('success', 'Item has Ordered waiting seller to confirm');

    }
}
