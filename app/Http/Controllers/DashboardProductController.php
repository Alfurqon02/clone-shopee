<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

class DashboardProductController extends Controller
{
    // public function index(){
    //     return view('dashboard-page.product.index',[
    //         'items'=>Item::all()
    //     ]);
    // }

    public function myItem()
    {
        $myItems = Item::where('user_id', Auth::user()->id)->get();
        return view('dashboard-page.product.index', [
            'items' => $myItems
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
            'image' => 'required',
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
                $path[] = 'uploads/' . $name;
                $imgData[] = $name;
            }
            $pathEncode = json_encode($path);
            $pathDecode = json_decode($pathEncode);
            $stringPath = implode(', ', $pathDecode);
            // dd($stringPath);
        }
        $item = new Item();
        $user_id = Auth::id();
        $slug = Str::slug($validatedData['name']);
        $idSlug = $item->id . $slug;
        $hashSlug = Hash::make($idSlug);
        $shortSlug = substr($hashSlug, 0, 8);
        $categories = $request->category;
        // dd($categories);
        // $item->image = json_encode($imgData);
        // $path = $item->image_path = json_encode($file);
        // dd($path);
        $item->fill(array_merge($validatedData, [
            'slug' => $shortSlug,
            'user_id' => $user_id,
            'image' => $stringPath
        ]));
        $item->save();
        $item->categories()->attach($categories);
        // Item::create($validatedData);
        return redirect(route('my.item'))->with('success', 'Item Added Successfully');
    }

    public function editItem(Item $item)
    {
        return view('dashboard-page.product.edit', [
            'categories' => Category::all(),
            'item' => $item
        ]);
    }

    public function updateitem(Request $request, Item $item)
    {
        $rules = [
            // 'image' => 'required',
            // 'image.*' => 'mimes:jpeg,jpg,png',
            'name' => 'required',
            'price' => 'required',
            // 'category' => 'required',
            'shipment' => 'required',
            'stock' => 'required',
        ];
        $slug = Str::slug($request->name);
        $request['slug'] = $slug;

        $validateData = $request->validate($rules);
        // dd($validateData);

        if ($request->description != $item->description) {
            $rules['description'] = 'required';
        }

        // dd($request);
        $categories = $request->category;

        if ($request->hasFile('image')) {
            if ($item->image) {
                unlink($item->image);
            }
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/uploads/', $name);
                $path[] = 'uploads/' . $name;
                $imgData[] = $name;
            }
            $pathEncode = json_encode($path);
            $pathDecode = json_decode($pathEncode);
            $stringPath = implode(', ', $pathDecode);
            // dd($stringPath);
            $rules['image'] = $stringPath;
        }
        $rules['user_id'] = Auth::id();

        // dd($request->validate($rules));
        // $validateData = Validator::make($request->all(), $rules);
        // if ($validateData->fails()) {
        //     // Jika validasi gagal, tampilkan error
        //     return response()->json(['error' => $validateData->errors()], 400);
        // }


        Item::where('id', $item->id)->update($validateData);
        $item->categories()->sync($categories);

        return redirect(route('my.item'))->with('success', 'Item Updated Successfully');
    }

    public function destroyItem(Item $item)
    {
        if (File::exists($item->image)) {
            if ($item->image) {
                unlink($item->image);
            }
        }
        $item = Item::find($item->id);
        $item->delete();
        return redirect(route('my.item'))->with('success', 'Item Deleted Successfully');
    }

    public function test()
    {
        return 'test';
    }
}
