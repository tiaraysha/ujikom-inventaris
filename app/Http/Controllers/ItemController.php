<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $items = Item::with('category')->get();
        return view ('admin.item', compact('categories', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
        ]);

        $lending = 0;
        $repair = 0;
        $available = $request->total - ($lending + $repair);

        Item::create([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            'total' => $validatedData['total'],
            'lending_total' => 0,
            'available' => $available
        ]);

        return redirect()->route('items')->with('success', 'Berhasil menambah data item');

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $updatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
        ]);

        if($updatedData) {
            return redirect()->route('items')->with('success', 'Berhasil merubah data kategori');
        } else {
            return redirect()->route('items')->with('error', 'Berhasil merubah data kategori');
        }

        $repair = 0;
        $brokeItem = ($request->brokeItem ?? 0);
        $newRepair = $repair + $brokeItem;
        

        $items = Item::findOrFail($id)([
            'name' => $updatedData['name'],
            'category_id' => $updatedData['category_id'],
            'total' => $updatedData['total'],
            'repair' => $repair,
        ]);

        $items->update();
        return redirect()->route('items')->with('success', 'Berhasil merubah data kategori');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
