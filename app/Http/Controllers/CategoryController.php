<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
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
            'division_pj' => 'required',
        ]);

        Category::create([
            'name' => $validatedData['name'],
            'division_pj' => $validatedData['division_pj'],
        ]);

        return redirect()->route('category')->with('success', 'Berhasil menambah data kategori!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
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
            'division_pj' => 'required',
        ]);

        if($updatedData) {
            return redirect()->back()->with('success', 'Berhasil merubah data kategori');
        } else {
            return redirect()->back()->with('error', 'Berhasil merubah data kategori');
        }

        $categories = Category::findOrFail($id)->update() ([
            'name' => $updatedData['name'],
            'division_pj' => $updatedData['division_pj'],
        ]);

        $categories->update();
        return redirect()->route('category')->with('success', 'Berhasil merubah data kategori');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
