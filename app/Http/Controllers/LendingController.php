<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;
use App\Models\Item;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        $lendings = Lending::with('item')->get();
        return view('staff.lending', compact('items', 'lendings'));
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
            'borrower_name' => 'required',
            'item_id' => 'required',
            'total' => 'required',
            'description' => 'required',
        ]);

        Lending::create([
            'borrower_name' => $validatedData['borrower_name'],
            'item_id' => $validatedData['item_id'],
            'total' => $validatedData['total'],
            'description' => $validatedData['description'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lending $lending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lending $lending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lending $lending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lending $lending)
    {
        //
    }
}
