<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Models\spesialis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.voucher.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.voucher.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'discount_percentage' => 'required|integer|min:0|max:100',
            'usage_limit' => 'nullable|integer|min:1',
            'expired_at' => 'nullable|date|after:today',
            'code' => 'required|string|unique:vouchers,code',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/vouchers'), $imageName);
            $validatedData['image'] = 'images/vouchers/' . $imageName;
        }

        try {
            $voucher = Voucher::create($validatedData);
            return redirect()->route('admin.vouchers.show', $voucher)->with('success', 'Voucher berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan voucher. Silakan coba lagi.');
        }
    }

    public function edit(Voucher $voucher)
    {
        return view('admin.voucher.edit', compact('voucher'));
    }

    public function show(Voucher $voucher)
    {
        return view('admin.voucher.show', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'discount_percentage' => 'required|integer|min:0|max:100',
            'usage_limit' => 'nullable|integer|min:1',
            'expired_at' => 'nullable|date|after:today',
            'code' => 'required|string|unique:vouchers,code,' . $voucher->id,
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($voucher->image && file_exists(public_path($voucher->image))) {
                unlink(public_path($voucher->image));
            }

            // Upload gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/vouchers'), $imageName);
            $validatedData['image'] = 'images/vouchers/' . $imageName;
        }

        try {
            $voucher->update($validatedData);
            return redirect()->route('admin.vouchers.index')->with('success', 'Data voucher berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data voucher. Silakan coba lagi.');
        }
    }

    public function destroy(Voucher $voucher)
    {
        Storage::disk('public')->delete($voucher->image);
        $voucher->delete();

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher deleted successfully.');
    }
    public function apply(Request $request)
{
    $voucherCode = $request->input('voucher_code');
    $spesialisId = $request->input('id_spesialis');

    $voucher = Voucher::where('code', $voucherCode)->first();
    $spesialis = Spesialis::find($spesialisId);

    if (!$spesialis) {
        return redirect()->back()->with('voucher_error', 'Data spesialis tidak ditemukan.');
    }

    // Store or update the specialist ID and price in session
    session(['specialist_id' => $spesialisId]);
    session(['specialist_price' => $spesialis->harga]);
    
    $totalPrice = $spesialis->harga;

    if ($voucher) {
        // Periksa apakah voucher masih valid
        if ($voucher->expired_at && now() > $voucher->expired_at) {
            return redirect()->back()->with('voucher_error', 'Voucher sudah kadaluarsa.');
        }

        // Periksa apakah voucher sudah digunakan
        if ($voucher->is_used) {
            return redirect()->back()->with('voucher_error', 'Voucher sudah digunakan.');
        }

        // Periksa apakah voucher memiliki batas penggunaan
        if ($voucher->usage_limit && $voucher->usage_count >= $voucher->usage_limit) {
            return redirect()->back()->with('voucher_error', 'Batas penggunaan voucher sudah tercapai.');
        }

        // Hitung diskon
        $discountAmount = ($totalPrice * $voucher->discount_percentage) / 100;
        $discountedPrice = $totalPrice - $discountAmount;

        // IMPORTANT: No longer increment usage_count here, we'll do it in PaymentController
        // when payment is confirmed

        // Simpan informasi voucher dan diskon dalam session
        session([
            'applied_voucher' => $voucher->code,
            'discount_percentage' => $voucher->discount_percentage,
            'discount_amount' => $discountAmount,
            'discounted_price' => $discountedPrice,
            'voucher_id' => $voucher->id // Store the voucher ID to update later
        ]);

        return redirect()->back()->with('voucher_success', 'Voucher berhasil diterapkan! Potongan harga: ' . $voucher->discount_percentage . '% (Rp ' . number_format($discountAmount, 0, ',', '.') . ')');
    } else {
        return redirect()->back()->with('voucher_error', 'Kode voucher tidak valid.');
    }
}

    public function removeVoucher(Request $request)
{
    // Remove voucher from session
    session()->forget([
        'applied_voucher',
        'discount_percentage',
        'discount_amount',
        'discounted_price'
    ]);

    return redirect()->back()->with('voucher_success', 'Voucher berhasil dihapus.');
}
}
