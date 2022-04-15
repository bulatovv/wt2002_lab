<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        return view('index', ['items' => Item::all()]);
    }

    public function create()
    {
        return view('item_form', [
            'action' => route('items.store'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image:jpg,png,webp,gif|max:1024'
        ]);

        $request->image->store('img');
        $data = $request->all();
        $data['image'] = $request->image->hashName(); 

        $item = new Item($data);
        $item->save();

        return redirect()->route('items.index');
    }

    public function show(Item $item)
    {
        return redirect()
            ->back()
            ->with(['show_modal' => $item]);
    }

    public function edit(Item $item)
    {
        return view('item_form', ['item' => $item]);
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'image' => 'image:jpg,png,webp,gif|max:1024'
        ]);

        $item->update($request->all());
        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        
        error_log($item);
        $item->delete();

        return redirect()->route('items.index');
    }
}
