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

    public function myItem()
    {
        return view('dashboard-page.product.index', [
            'items' => Item::all()
        ]);
    }

    public function addItem()
    {
        return view('dashboard-page.product.create', [
            'categories' => Category::all()
        ]);
    }

    public function storeItem(Request $request)
    {
        $validatedData = $request->validate([
            // 'image' => 'required',
            // 'image.*' => 'mimes:jpeg,jpg,png',
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'shipment' => 'required',
            'stock' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $path[] = 'uploads/'.$name;
                $imgData[] = $name;
            }
            $pathEncode = json_encode($path);
            $pathDecode = json_decode($pathEncode);
            $stringPath = implode(', ', $pathDecode);
            // dd($stringPath);

            $user_id = Auth::id();
            $slug = Str::slug($validatedData['name']);
            $categories = $request->category;
            // dd($categories);
            $item = new Item();
            // $item->image = json_encode($imgData);
            // $path = $item->image_path = json_encode($file);
            // dd($path);
            $item->fill(array_merge($validatedData, [
                'slug' => $slug,
                'user_id' => $user_id,
                'image' => $stringPath
            ]));
            $item->save();
            $item->categories()->attach($categories);
            // Item::create($validatedData);
            return redirect(route('my.item'))->with('success', 'Item Added Successfully');
        }
    }

    public function editItem(){
        return view('dashboard-page.product.edit', [
            'categories' => Category::all()
        ]);
    }

    public function destroyItem(Item $item){
        if ($item->image){
            unlink($item->image);
        }
        $item = Item::find($item->id);
        // dd($item);
        $item->delete();
        return redirect(route('my.item'))->with('success', 'Item Deleted Successfully');

    }

    public function test()
    {
        return 'test';
    }
}
