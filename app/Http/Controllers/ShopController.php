<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ShopController extends Controller
{
    public function category(){}

    public function item(Item $item){
        return view ('main-page.item',[
            'name'=>$item->name,
            'price'=>$item->price,
            'description'=>$item->description,
            'stock'=>$item->stock
        ]);
    }
}
