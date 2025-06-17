<?php

namespace App\Http\Controllers;

use App\Models\Spesialis;
use App\Services\TripayService;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    protected $tripayService;

    public function __construct(TripayService $tripayService)
    {
        $this->tripayService = $tripayService;
    }

    public function getWhatsAppNumber($id_spesialis)
    {
        $spesialis = Spesialis::findOrFail($id_spesialis);
        return response()->json(['whatsappNumber' => $spesialis->noHP]);
    }
    
    public function bayar($id_spesialis)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu untuk melakukan pembayaran.');
        }
        
        $spesialis = Spesialis::findOrFail($id_spesialis);
        
        // Get available payment channels from Tripay
        $paymentChannelsResponse = $this->tripayService->getPaymentChannels();
        $paymentChannels = [];
        
        if ($paymentChannelsResponse && $paymentChannelsResponse['success']) {
            $paymentChannels = $paymentChannelsResponse['data'];
        }
        
        // Store specialist information in session for voucher validation
        session(['specialist_id' => $id_spesialis]);
        
        // Get the price from the specialist
        if (!session()->has('specialist_price')) {
            session(['specialist_price' => $spesialis->harga]);
        }
        
        return view('user.spesBayar', compact('spesialis', 'paymentChannels'));
    }

    public function showSpes(Request $request)
    {
        $query = Spesialis::query();

        // Search by name
        if ($request->filled('nama')) {
            $searchTerm = $request->input('nama');
            $query->where('nama', 'like', '%' . $searchTerm . '%');
        }

        // Filter by price range
        if ($request->filled('min_price') || $request->filled('max_price')) {
            if ($request->filled('min_price')) {
                $query->where('harga', '>=', $request->input('min_price'));
            }
            if ($request->filled('max_price')) {
                $query->where('harga', '<=', $request->input('max_price'));
            }
        }

        if ($request->filled('location')) {
            $query->where('alamat', 'like', '%' . $request->input('location') . '%');
        }    

        $spesLihat = $query->get();

        return view('user.spesialis', compact('spesLihat'));
    }

    public function spesFilter(Request $request)
    {
        $spes = $request->input('spesialisasi');
        $spesFilter = Spesialis::where('spesialisasi', 'like', "%$spes%")->get();
        return view('user.spesialisFilter', compact('spesFilter'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spesialis = Spesialis::all();
        return view('admin.spesialis.index', compact('spesialis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formspesialis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'spesialisasi' => 'required|string',
            'tempatTugas' => 'required|string',
            'alamat' => 'required|string',
            'noHP' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = 'images/' . $imageName;
        }

        try {
            $spesialis = Spesialis::create($validatedData);
            return redirect()->route('admin.spesialisis.index')->with('success', 'Data Spesialis berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data Spesialis. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_spesialis)
    {
        $spesialis = Spesialis::findOrFail($id_spesialis);
        return view('admin.spesialis.show', compact('spesialis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_spesialis)
    {
        $spesialis = Spesialis::findOrFail($id_spesialis);
        return view('admin.spesialis.edit', compact('spesialis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_spesialis)
    {
        $spesialis = Spesialis::findOrFail($id_spesialis);
        
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer',
            'spesialisasi' => 'required|string',
            'tempatTugas' => 'required|string',
            'alamat' => 'required|string',
            'noHP' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($spesialis->image && file_exists(public_path($spesialis->image))) {
                unlink(public_path($spesialis->image));
            }
            
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = 'images/' . $imageName;
        }

        try {
            $spesialis->update($validatedData);
            return redirect()->route('admin.spesialisis.index')->with('success', 'Data Spesialis berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data Spesialis. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_spesialis)
    {
        try {
            $spesialis = Spesialis::findOrFail($id_spesialis);
            
            // Delete image if exists
            if ($spesialis->image && file_exists(public_path($spesialis->image))) {
                unlink(public_path($spesialis->image));
            }
            
            $spesialis->delete();
            return redirect()->route('admin.spesialisis.index')->with('success', 'Data Spesialis berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data Spesialis. Silakan coba lagi.');
        }
    }
}
