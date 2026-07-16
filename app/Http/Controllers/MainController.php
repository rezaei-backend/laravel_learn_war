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


    public function edit(string $id)
    {
        $item = Item::find($id);
        return view('edit' , compact('item'));
    }


}
