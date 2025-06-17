<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\spa;

class SpasController extends Controller
{
    public function index()
    {
        $spas = Spa::all();
        return view('admin.spas.index', compact('spas'));
    }

    public function create()
    {
        return view('admin.spas.create'); // Pastikan view ini tersedia
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'noHP' => 'required|string',
            'waktuBuka' => 'required|array',
            'waktuBuka.*' => 'required|string',
            'maps' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('spa_images', 'public');
            $data['image'] = $imagePath;
        }

        Spa::create($data);

        return redirect()->route('admin.spas.index')->with('success', 'Spa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $spa = Spa::findOrFail($id);
        return view('admin.spas.edit', compact('spa'));
    }

    public function update(Request $request, $id)
    {
        $spa = Spa::findOrFail($id);

        $spa->maps = $request->input('maps');
        $spa->save();

        $data = $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'noHP' => 'required|string',
            'waktuBuka' => 'required|array',
            'maps' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('spa_images', 'public');
            $data['image'] = $imagePath;
        }

        $spa->update($data);

        return redirect()->route('admin.spas.index')->with('success', 'Spa berhasil diupdate');
    }

    public function destroy($id)
    {
        $spa = Spa::findOrFail($id);
        $spa->delete();
        return redirect()->route('admin.spas.index')->with('success', 'Spa berhasil dihapus');
    }
}
