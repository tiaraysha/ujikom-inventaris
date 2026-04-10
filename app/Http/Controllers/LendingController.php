<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;
use App\Models\Item;
use Carbon\Carbon;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();

        $lendings = Lending::all();
        
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
            'items' => 'required|array',
            'totals' => 'required|array',
            'description' => 'required',
        ],
        [
            'borrower_name.required' => 'Nama harus diisi',
            'items.required' => 'Item harus diisi',
            'totals.required' => 'Total harus diisi',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        foreach ($request->items as $key => $itemId) {
        $qty = $request->totals[$key];
        $item = Item::find($itemId);

        if ($qty > $item->available) {
            return redirect()->back()
                ->with('error', 'Stok tidak cukup untuk item: ' . $item->name)
                ->withInput();
        }
    }

        foreach ($request->items as $key => $itemId) {
            $qty = $request->totals[$key];
            $item = Item::find($itemId);

            if ($qty > $item->available) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi')->withInput();
            }

            if ($qty > 0) {
                Lending::create([
                    'borrower_name' => $request->borrower_name,
                    'item_id'         => $itemId,
                    'total'         => $qty,
                    'description'   => $request->description,
                    'status'        => 'Not Returned',
                    'edited_by'     => Auth::user()->name,
                    'date'          => Carbon::now()->format('Y-m-d'),
                ]);

                $item->lending += $qty;
                $item->lending_total += $qty;
                $item->available = $item->total - ($item->repair + $item->lending);
                $item->save();
            }
        }

        return redirect()->route('staff.lending')->with('success', 'Data berhasil ditambahkan!');
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
    public function destroy(Lending $lending, $id)
    {
        $lendings = Lending::where('id', $id)->delete();

        return redirect()->route('lendings')->with('success', 'Berhasil menghapus peminjaman');

    }
    // public function export() {
    //     $filename = 'data-lending.xlsx';
    //     return Excel::download($filename);
    // }
}
