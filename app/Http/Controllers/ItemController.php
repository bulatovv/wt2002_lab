<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class ItemController extends Controller
{    
    
    public function __construct()
    {
        $this->authorizeResource(Item::class, 'item');
    }

    public function index()
    {
        return view('index', ['items' => Item::all()]);
    }
    
    public function indexTrashed()
    {
        return view('index', ['items' => Item::onlyTrashed()->get()]);
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
        return view('item', ['item' => $item->load('comments.user')]);
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
        return redirect()->back();
    }

    public function destroy(Item $item)
    {        
        $item->delete();
        return redirect()->back();
    }


    public function forceDelete($id)
    {
        $item = Item::withTrashed()->findOrFail($id);
        $item->forceDelete();

        return redirect()->back();
    }

    public function restore($id) 
    {
        $item = Item::withTrashed()->findOrFail($id);
        $item->restore(); 
        
        return redirect()->back();
    }

}
