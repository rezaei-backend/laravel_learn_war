<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public  function index()
    {
        $items = Item::all();
        return view('main' , compact('items'));
    }

    public  function store(Request $request)
    {
        $validated=$request->validate([
            'title' => ['required', 'max:255'],
            'price' => ['required'],
        ]);

        $city = Item::create([
            'title' => $validated['title'],
            'price' => $validated['price'],

        ]);

    return redirect()->back()->with(['message' => 'با موفقیت اضافه شد']);

    }



//    public function store(Request $request)
//    {
//        $validated = $request->validate([
//            'title' => 'required|string|max:25|unique:category',
//            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//        ]);
//        $imageName = time().'divar'.'.'.$request->category_image->extension();
//        $request->category_image->move(public_path('images'), $imageName);
//
//        $city = Category::create([
//            'title' => $validated['title'],
//            'category_image'=>'images/'.$imageName,
//        ]);
//
//        return redirect()->back()->with('success', 'Product created successfully.');
//    }




}
