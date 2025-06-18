<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pharmacy;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AdminPharmacyController extends Controller
{
    public function index(Request $request)
    {
        $query = Pharmacy::with(['medicines' => function($q) {
            $q->wherePivot('is_available', true);
        }]);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->search($request->search);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            if ($request->status == 'active') {
                $query->where('is_active', true);
            } elseif ($request->status == 'inactive') {
                $query->where('is_active', false);
            }
        }

        $pharmacies = $query->latest()->paginate(10);
        
        return view('admin.pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        $medicines = Medicine::orderBy('nama')->get();
        $facilities = Pharmacy::getFacilitiesOptions();
        
        return view('admin.pharmacies.create', compact('medicines', 'facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'description' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facilities' => 'nullable|array',
            'operating_hours' => 'required|array',
            'operating_hours.*.is_open' => 'required|boolean',
            'operating_hours.*.open' => 'required_if:operating_hours.*.is_open,true|date_format:H:i',
            'operating_hours.*.close' => 'required_if:operating_hours.*.is_open,true|date_format:H:i',
            'medicines' => 'nullable|array',
            'medicines.*.medicine_id' => 'required_with:medicines|exists:medicines,id_medicine',
            'medicines.*.stock' => 'required_with:medicines|integer|min:0',
            'medicines.*.price' => 'nullable|integer|min:0',
            'medicines.*.notes' => 'nullable|string',
        ]);

        DB::beginTransaction();
        
        try {
            $data = $request->except(['image', 'medicines']);
            
            // Handle image upload
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('pharmacies', 'public');
            }

            $pharmacy = Pharmacy::create($data);

            // Attach medicines if provided
            if ($request->has('medicines') && is_array($request->medicines)) {
                foreach ($request->medicines as $medicineData) {
                    if (!empty($medicineData['medicine_id'])) {
                        $pharmacy->medicines()->attach($medicineData['medicine_id'], [
                            'stock' => $medicineData['stock'] ?? 0,
                            'price' => $medicineData['price'] ?? null,
                            'is_available' => true,
                            'notes' => $medicineData['notes'] ?? null,
                        ]);
                    }
                }
            }

            DB::commit();
            
            return redirect()->route('admin.pharmacies.index')
                           ->with('success', 'Pharmacy berhasil ditambahkan.');
                           
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show(Pharmacy $pharmacy)
    {
        $pharmacy->load(['medicines' => function($q) {
            $q->orderBy('nama');
        }]);
        
        $medicinesByCategory = $pharmacy->medicines->groupBy('kategori');
        
        return view('admin.pharmacies.show', compact('pharmacy', 'medicinesByCategory'));
    }

    public function edit(Pharmacy $pharmacy)
    {
        $pharmacy->load('medicines');
        $medicines = Medicine::orderBy('nama')->get();
        $facilities = Pharmacy::getFacilitiesOptions();
        
        return view('admin.pharmacies.edit', compact('pharmacy', 'medicines', 'facilities'));
    }

    public function update(Request $request, Pharmacy $pharmacy)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'description' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'facilities' => 'nullable|array',
            'operating_hours' => 'required|array',
            'medicines' => 'nullable|array',
        ]);

        DB::beginTransaction();
        
        try {
            $data = $request->except(['image', 'medicines']);
            
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($pharmacy->image) {
                    Storage::disk('public')->delete($pharmacy->image);
                }
                $data['image'] = $request->file('image')->store('pharmacies', 'public');
            }

            $pharmacy->update($data);

            // Update medicines relationship
            if ($request->has('medicines')) {
                $pharmacy->medicines()->detach(); // Remove all existing relationships
                
                foreach ($request->medicines as $medicineData) {
                    if (!empty($medicineData['medicine_id'])) {
                        $pharmacy->medicines()->attach($medicineData['medicine_id'], [
                            'stock' => $medicineData['stock'] ?? 0,
                            'price' => $medicineData['price'] ?? null,
                            'is_available' => ($medicineData['is_available'] ?? true),
                            'notes' => $medicineData['notes'] ?? null,
                        ]);
                    }
                }
            }

            DB::commit();
            
            return redirect()->route('admin.pharmacies.index')
                           ->with('success', 'Pharmacy berhasil diperbarui.');
                           
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(Pharmacy $pharmacy)
    {
        try {
            // Delete image if exists
            if ($pharmacy->image) {
                Storage::disk('public')->delete($pharmacy->image);
            }
            
            // Delete pharmacy (medicines relationship will be deleted automatically due to cascade)
            $pharmacy->delete();
            
            return redirect()->route('admin.pharmacies.index')
                           ->with('success', 'Pharmacy berhasil dihapus.');
                           
        } catch (\Exception $e) {
            return redirect()->back()
                           ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function toggleStatus(Pharmacy $pharmacy)
    {
        $pharmacy->update(['is_active' => !$pharmacy->is_active]);
        
        $status = $pharmacy->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        return redirect()->back()
                       ->with('success', "Pharmacy berhasil {$status}.");
    }
}