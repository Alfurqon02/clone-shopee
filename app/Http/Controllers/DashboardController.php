<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index(){
    //     return view('dashboard-page.product.index',[
    //         'items'=>Item::all()
    //     ]);
    // }

    public function myItem(){
        return view('dashboard-page.product.index',[
            'items'=>Item::all()
        ]);
    }

    public function addItem(){
        return view('dashboard-page.product.create', [
            'categories' => Category::all()
        ]);
    }

    public function storeItem(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'shipment' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);

        $user_id = Auth::id();
        $slug = Str::slug($validatedData['name']);
        $categories = $request->category;
        // dd($categories);
        $item = new Item();
        $item->fill(array_merge($validatedData, [
            'slug' => $slug,
            'user_id' => $user_id,
        ]));
        $item->save();
        $item->categories()->attach($categories);
        // Item::create($validatedData);
        return redirect(route('my.item'))->with('success', 'Item Added Successfully');



    }

    public function test(){
        return 'test';
    }
}
