<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MedicineController extends Controller
{
    /**
     * Display dashboard with medicine statistics
     */
    public function dashboard()
    {
        $medicineCount = Medicine::count();
        $lowStockCount = Medicine::where('stok', '<=', 10)->count();
        $expiringSoonCount = Medicine::where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(30))->count();
        $expiredCount = Medicine::where('tanggal_kadaluarsa', '<', Carbon::now())->count();
        
        $totalValue = Medicine::sum(DB::raw('harga * stok'));
        
        // Recent medicines
        $recentMedicines = Medicine::latest()->take(5)->get();
        
        // Low stock medicines
        $lowStockMedicines = Medicine::where('stok', '<=', 10)->take(5)->get();
        
        // Expiring medicines
        $expiringMedicines = Medicine::where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(30))
                                   ->where('tanggal_kadaluarsa', '>=', Carbon::now())
                                   ->take(5)->get();

        return view('admin.dashboard', compact(
            'medicineCount', 
            'lowStockCount', 
            'expiringSoonCount', 
            'expiredCount',
            'totalValue',
            'recentMedicines',
            'lowStockMedicines',
            'expiringMedicines'
        ));
    }

    /**
     * Display a listing of medicines for public users
     */
    public function index(Request $request)
    {
        $query = Medicine::query();
        $searchPerformed = false;
        $searchCriteria = [];

        // Search by name
        if ($request->filled('name')) {
            $query->where('nama', 'like', '%' . $request->name . '%');
            $searchPerformed = true;
            $searchCriteria[] = "nama: " . $request->name;
        }

        // Search by category
        if ($request->filled('category')) {
            $query->where('kategori', 'like', '%' . $request->category . '%');
            $searchPerformed = true;
            $searchCriteria[] = "kategori: " . $request->category;
        }

        // Filter by price range
        if ($request->filled('min_price') || $request->filled('max_price')) {
            if ($request->filled('min_price')) {
                $query->where('harga', '>=', $request->min_price);
                $searchCriteria[] = "harga minimal: Rp " . number_format($request->min_price, 0, ',', '.');
            }
            if ($request->filled('max_price')) {
                $query->where('harga', '<=', $request->max_price);
                $searchCriteria[] = "harga maksimal: Rp " . number_format($request->max_price, 0, ',', '.');
            }
            $searchPerformed = true;
        }

        // Filter by stock availability
        if ($request->filled('in_stock')) {
            $query->where('stok', '>', 0);
            $searchPerformed = true;
            $searchCriteria[] = "tersedia";
        }

        // Filter by manufacturer
        if ($request->filled('manufacturer')) {
            $query->where('produsen', 'like', '%' . $request->manufacturer . '%');
            $searchPerformed = true;
            $searchCriteria[] = "produsen: " . $request->manufacturer;
        }

        // Exclude expired medicines for public view
        $query->where('tanggal_kadaluarsa', '>=', Carbon::now());

        $medicineTotal = $query->paginate(12);

        // Set search status
        if ($searchPerformed) {
            $searchCriteriaString = implode(', ', $searchCriteria);
            if ($medicineTotal->isEmpty()) {
                session()->flash('search_status', 'not_found');
                session()->flash('search_query', $searchCriteriaString);
            } else {
                session()->flash('search_status', 'success');
                session()->flash('search_query', $searchCriteriaString);
            }
        } else {
            session()->forget(['search_status', 'search_query']);
        }

        // Get categories for filter
        $categories = Medicine::distinct()->pluck('kategori');
        $manufacturers = Medicine::distinct()->pluck('produsen');
    $medicines = Medicine::all(); // ambil semua data dari tabel medicines

    return view('admin.medicines.index', compact('medicines'));
    }

    /**
     * Display a listing of medicines for admin
     */
    public function adminIndex(Request $request)
    {
        $query = Medicine::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('produsen', 'like', '%' . $search . '%');
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('kategori', $request->category);
        }

        // Filter by stock status
        if ($request->filled('stock_status')) {
            switch ($request->stock_status) {
                case 'out_of_stock':
                    $query->where('stok', 0);
                    break;
                case 'low_stock':
                    $query->where('stok', '>', 0)->where('stok', '<=', 10);
                    break;
                case 'in_stock':
                    $query->where('stok', '>', 10);
                    break;
            }
        }

        // Filter by expiry status
        if ($request->filled('expiry_status')) {
            switch ($request->expiry_status) {
                case 'expired':
                    $query->where('tanggal_kadaluarsa', '<', Carbon::now());
                    break;
                case 'expiring_soon':
                    $query->where('tanggal_kadaluarsa', '>=', Carbon::now())
                          ->where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(30));
                    break;
                case 'safe':
                    $query->where('tanggal_kadaluarsa', '>', Carbon::now()->addDays(30));
                    break;
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $medicines = $query->paginate(15)->withQueryString();

        // Get filter options
        $categories = Medicine::distinct()->pluck('kategori');

        return view('admin.medicines.index', compact('medicines', 'categories'));
    }

    /**
     * Show the form for creating a new medicine
     */
    public function create()
    {
        $categories = [
            'Antibiotik',
            'Vitamin',
            'Analgesik',
            'Antasida',
            'Antihistamin',
            'Obat Batuk',
            'Obat Demam',
            'Obat Mata',
            'Obat Kulit',
            'Suplemen',
            'Lainnya'
        ];

        return view('admin.medicines.create', compact('categories'));
    }

    /**
     * Store a newly created medicine in storage
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:medicines,nama',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string|min:10',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date|after:today',
            'produsen' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'nama.unique' => 'Medicine with this name already exists.',
            'tanggal_kadaluarsa.after' => 'Expiry date must be after today.',
            'image.required' => 'Medicine image is required.',
            'deskripsi.min' => 'Description must be at least 10 characters.'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/medicines'), $imageName);
                $validatedData['image'] = 'images/medicines/' . $imageName;
            }

            $medicine = Medicine::create($validatedData);

            return redirect()->route('admin.medicines.show', $medicine->id_medicine)
                           ->with('success', 'Medicine has been successfully added.');

        } catch (\Exception $e) {
            // Delete uploaded image if database save fails
            if (isset($validatedData['image']) && file_exists(public_path($validatedData['image']))) {
                unlink(public_path($validatedData['image']));
            }

            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Failed to save medicine data. Please try again.');
        }
    }

    /**
     * Display the specified medicine
     */
    public function show(Medicine $medicine)
    {
        // Calculate additional information
        $daysUntilExpiry = Carbon::now()->diffInDays($medicine->tanggal_kadaluarsa, false);
        $stockValue = $medicine->harga * $medicine->stok;

        return view('admin.medicines.show', compact('medicine', 'daysUntilExpiry', 'stockValue'));
    }

    /**
     * Show the form for editing the specified medicine
     */
    public function edit(Medicine $medicine)
    {
        $categories = [
            'Antibiotik',
            'Vitamin',
            'Analgesik',
            'Antasida',
            'Antihistamin',
            'Obat Batuk',
            'Obat Demam',
            'Obat Mata',
            'Obat Kulit',
            'Suplemen',
            'Lainnya'
        ];

        return view('admin.medicines.edit', compact('medicine', 'categories'));
    }

    /**
     * Update the specified medicine in storage
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255|unique:medicines,nama,' . $medicine->id_medicine . ',id_medicine',
            'harga' => 'required|integer|min:0',
            'deskripsi' => 'required|string|min:10',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date|after:today',
            'produsen' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'nama.unique' => 'Medicine with this name already exists.',
            'tanggal_kadaluarsa.after' => 'Expiry date must be after today.',
            'deskripsi.min' => 'Description must be at least 10 characters.'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($medicine->image && file_exists(public_path($medicine->image))) {
                    unlink(public_path($medicine->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/medicines'), $imageName);
                $validatedData['image'] = 'images/medicines/' . $imageName;
            }

            $medicine->update($validatedData);

            return redirect()->route('admin.medicines.show', $medicine->id_medicine)
                           ->with('success', 'Medicine has been successfully updated.');

        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Failed to update medicine data. Please try again.');
        }
    }

    /**
     * Remove the specified medicine from storage
     */
    public function destroy(Medicine $medicine)
    {
        try {
            // Delete image file
            if ($medicine->image && file_exists(public_path($medicine->image))) {
                unlink(public_path($medicine->image));
            }

            $medicine->delete();

            return redirect()->route('admin.medicines.index')
                           ->with('success', 'Medicine has been successfully deleted.');

        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Failed to delete medicine. Please try again.');
        }
    }

    /**
     * Update stock for a medicine
     */
    public function updateStock(Request $request, Medicine $medicine)
    {
        $request->validate([
            'stok' => 'required|integer|min:0',
            'action' => 'required|in:add,subtract,set'
        ]);

        $currentStock = $medicine->stok;
        $newStock = $request->stok;

        switch ($request->action) {
            case 'add':
                $medicine->stok = $currentStock + $newStock;
                break;
            case 'subtract':
                $medicine->stok = max(0, $currentStock - $newStock);
                break;
            case 'set':
                $medicine->stok = $newStock;
                break;
        }

        $medicine->save();

        return redirect()->back()->with('success', 'Stock updated successfully.');
    }

    /**
     * Get medicines with low stock
     */
    public function lowStock()
    {
        $medicines = Medicine::where('stok', '<=', 10)->orderBy('stok', 'asc')->get();
        return view('admin.medicines.low-stock', compact('medicines'));
    }

    /**
     * Get medicines that are expiring soon
     */
    public function expiringSoon()
    {
        $medicines = Medicine::where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(30))
                            ->where('tanggal_kadaluarsa', '>=', Carbon::now())
                            ->orderBy('tanggal_kadaluarsa', 'asc')
                            ->get();
        
        return view('admin.medicines.expiring-soon', compact('medicines'));
    }

    /**
     * Get expired medicines
     */
    public function expired()
    {
        $medicines = Medicine::where('tanggal_kadaluarsa', '<', Carbon::now())
                            ->orderBy('tanggal_kadaluarsa', 'desc')
                            ->get();
        
        return view('admin.medicines.expired', compact('medicines'));
    }

    /**
     * Export medicines to CSV
     */
    public function export()
    {
        $medicines = Medicine::all();
        
        $filename = 'medicines_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($medicines) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, [
                'ID', 'Name', 'Price', 'Category', 'Stock', 
                'Expiry Date', 'Manufacturer', 'Description', 'Created At'
            ]);

            // Add data rows
            foreach ($medicines as $medicine) {
                fputcsv($file, [
                    $medicine->id_medicine,
                    $medicine->nama,
                    $medicine->harga,
                    $medicine->kategori,
                    $medicine->stok,
                    $medicine->tanggal_kadaluarsa->format('Y-m-d'),
                    $medicine->produsen,
                    $medicine->deskripsi,
                    $medicine->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Get medicine statistics
     */
    public function statistics()
    {
        $stats = [
            'total_medicines' => Medicine::count(),
            'total_stock_value' => Medicine::sum(DB::raw('harga * stok')),
            'low_stock_count' => Medicine::where('stok', '<=', 10)->count(),
            'out_of_stock_count' => Medicine::where('stok', 0)->count(),
            'expiring_soon_count' => Medicine::where('tanggal_kadaluarsa', '<=', Carbon::now()->addDays(30))
                                           ->where('tanggal_kadaluarsa', '>=', Carbon::now())->count(),
            'expired_count' => Medicine::where('tanggal_kadaluarsa', '<', Carbon::now())->count(),
            'categories_count' => Medicine::distinct('kategori')->count(),
            'manufacturers_count' => Medicine::distinct('produsen')->count(),
        ];

        // Category distribution
        $categoryStats = Medicine::select('kategori', DB::raw('count(*) as count'))
                                ->groupBy('kategori')
                                ->orderBy('count', 'desc')
                                ->get();

        // Monthly stock value
        $monthlyStats = Medicine::select(
                                    DB::raw('MONTH(created_at) as month'),
                                    DB::raw('YEAR(created_at) as year'),
                                    DB::raw('SUM(harga * stok) as total_value')
                                )
                                ->groupBy('year', 'month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->take(12)
                                ->get();

        return view('admin.medicines.statistics', compact('stats', 'categoryStats', 'monthlyStats'));
    }
}

