<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'required|image|max:2048'
        ]);

        $item = new Item();

        $item->name = $request->name;
        $item->price = $request->price;

        // Save l'image
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $item->img = $imagePath;
        }

        $item->save();

        return redirect()->route('admin.index')->with('success','Nouveau produit ajouté avec succès');
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
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'img' => 'image|max:2048'
        ]);

        $id = $request->id;

        $item = Item::findOrFail($id);

        $item->name = $request->name;
        $item->price = $request->price;

        // Enregistre nouvelle image & supprime ancienne.
        if ($request->hasFile('img')) {

            if ($item->img) {
                Storage::delete('public/' . $item->img);
            }

            $imagePath = $request->file('img')->store('images', 'public');
            $item->img = $imagePath;
        }

        $item->save();

        return redirect()->route('admin.index')->with('success','Produit modifié avec succès');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        if ($item->img) {
            Storage::delete('public/' . $item->img);
        };

        $item->delete();

        return redirect()->route('admin.index')->with('success', 'Le produit a été supprimé avec succès.');
    }
}
