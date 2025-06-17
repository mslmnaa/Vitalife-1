<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yoga;

class YogasController extends Controller
{
    public function index()
    {
        $yogas = Yoga::all();
        return view('admin.yogas.index', compact('yogas'));
    }

    public function create()
    {
        return view('admin.yogas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'alamat' => 'required|string|max:255',
            'noHP' => 'required|string|max:50',
            'waktuBuka' => 'required|string|max:255',
            // 'image' => 'nullable|image|max:2048', // jika pakai gambar
        ]);

        // Jika kamu memang ingin menyimpan field ini sebagai array dalam database (misal JSON), 
        // maka kita bisa encode dulu. Tapi kalau di DB hanya varchar biasa, simpan saja string.
        // Misal kamu mau simpan sebagai JSON (pilih salah satu sesuai kebutuhan):
        /*
        $data = [
            'nama' => explode(',', $validated['nama']),
            'harga' => explode(',', $validated['harga']),
            'alamat' => explode(',', $validated['alamat']),
            'noHP' => explode(',', $validated['noHP']),
            'waktuBuka' => explode(',', $validated['waktuBuka']),
        ];
        */

        // Kalau di DB kamu simpan plain string:
        $yoga = new Yoga();
        $yoga->nama = $validated['nama'];
        $yoga->harga = $validated['harga'];
        $yoga->alamat = $validated['alamat'];
        $yoga->noHP = $validated['noHP'];
        $yoga->waktuBuka = $validated['waktuBuka'];

        // Jika ada upload gambar (opsional)
        /*
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('yoga-images', 'public');
            $yoga->image = $imagePath;
        }
        */

        $yoga->save();

        return redirect()->route('admin.yogas.index')->with('success', 'Yoga berhasil ditambahkan');
    }

    public function edit($id_yoga)
    {
        $yoga = Yoga::findOrFail($id_yoga);
        return view('admin.yogas.edit', compact('yoga'));
    }

    public function update(Request $request, $id_yoga)
    {
        $yoga = Yoga::findOrFail($id_yoga);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'alamat' => 'required|string|max:255',
            'noHP' => 'required|string|max:50',
            'waktuBuka' => 'required|string|max:255',
            // 'image' => 'nullable|image|max:2048',
        ]);

        $yoga->nama = $validated['nama'];
        $yoga->harga = $validated['harga'];
        $yoga->alamat = $validated['alamat'];
        $yoga->noHP = $validated['noHP'];
        $yoga->waktuBuka = $validated['waktuBuka'];

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('yoga-images', 'public');
        //     $yoga->image = $imagePath;
        // }

        $yoga->save();

        return redirect()->route('admin.yogas.index')->with('success', 'Yoga berhasil diperbarui');
    }

    public function destroy($id_yoga)
    {
        $yoga = Yoga::findOrFail($id_yoga);
        $yoga->delete();
        return redirect()->route('admin.yogas.index')->with('success', 'Yoga berhasil dihapus');
    }
}
