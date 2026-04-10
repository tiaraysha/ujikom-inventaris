<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ItemExport;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        
        $items = Item::with('category')->get();
        // return view('admin.item', compact('categories', 'items'));
        
        if(Auth::user()->role == 'Admin') {
            return view('admin.item', compact('items', 'categories'))->with('success', 'Data berhasil ditambahkan!');
        } else {
            return view('staff.item', compact('items', 'categories'))->with('success', 'Data berhasil ditambahkan!');
        }

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

        $total = $request->total;
        $repair = 0;
        $lending = 0;

        $available = $total - ($repair + $lending);

        Item::create([
            'name' => $validatedData['name'],
            'category_id' => $validatedData['category_id'],
            'total' => $validatedData['total'],
            'lending_total' => 0,
            'available' => $available,
            'repair' => 0,
            'lending' => 0,
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
        $item = Item::findOrFail($id);

        $updatedData = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'total' => 'required',
            'brokeItem' => 'nullable|min:0'
        ]);

        $newRepairTotal = $item->repair + ($request->brokeItem ?? 0);

        $item->update([
            'name' => $updatedData['name'],
            'category_id' => $updatedData['category_id'],
            'total' => $updatedData['total'],
            'repair' => $newRepairTotal,
            'available' => $updatedData['total'] - ($item->lending + $newRepairTotal),
        ]);

        return redirect()->route('admin.items')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }

    public function export()
    {
        $filename = 'data-item.xlsx';
        return Excel::download(new ItemExport, $filename);
    }
}
