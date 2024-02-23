<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ShopController extends Controller
{
    public function category(){}

    public function item(Item $item){
        return view ('main-page.item',[
            'item'=>$item
        ]);
    }
}
