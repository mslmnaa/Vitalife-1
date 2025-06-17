<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Medicine;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index(Request $request)
    {
        $query = Pharmacy::active()->with(['medicines' => function ($q) {
            $q->wherePivot('is_available', true)->wherePivot('stock', '>', 0);
        }]);

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $query->search($request->search);
        }

        // Location-based search
        if ($request->has('latitude') && $request->has('longitude')) {
            $radius = $request->get('radius', 10); // Default 10km radius
            $query->nearby($request->latitude, $request->longitude, $radius);
        }

        // Medicine filter - show pharmacies that have this medicine
        if ($request->has('medicine_id') && $request->medicine_id != '') {
            $query->withMedicine($request->medicine_id);
        }

        // Facility filter
        if ($request->has('facility') && $request->facility != '') {
            $query->whereJsonContains('facilities', $request->facility);
        }

        $pharmacies = $query->paginate(12);
        
        // Get medicines for filter dropdown
        $medicines = Medicine::available()->orderBy('nama')->get();
        $facilities = Pharmacy::getFacilitiesOptions();

        return view('user.pharmacies.index', compact('pharmacies', 'medicines', 'facilities'));
    }

    public function show($id)
    {
        $pharmacy = Pharmacy::active()
                           ->with(['medicines' => function ($q) {
                               $q->wherePivot('is_available', true)
                                 ->wherePivot('stock', '>', 0)
                                 ->orderBy('nama');
                           }])
                           ->findOrFail($id);

        // Get categories for grouping medicines
        $medicinesByCategory = $pharmacy->medicines->groupBy('kategori');

        return view('user.pharmacies.show', compact('pharmacy', 'medicinesByCategory'));
    }

    public function checkMedicine(Request $request)
    {
        $medicineId = $request->get('medicine_id');
        
        if (!$medicineId) {
            return response()->json(['error' => 'Medicine ID is required'], 400);
        }

        $medicine = Medicine::findOrFail($medicineId);
        
        $pharmacies = Pharmacy::active()
                             ->withMedicine($medicineId)
                             ->with(['medicines' => function ($q) use ($medicineId) {
                                 $q->where('medicine_id', $medicineId);
                             }])
                             ->get();

        return view('user.pharmacies.medicine-checker', compact('medicine', 'pharmacies'));
    }

    public function nearby(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'nullable|numeric|min:1|max:50'
        ]);

        $radius = $request->get('radius', 10);
        
        $pharmacies = Pharmacy::active()
                             ->nearby($request->latitude, $request->longitude, $radius)
                             ->with(['medicines' => function ($q) {
                                 $q->wherePivot('is_available', true)->wherePivot('stock', '>', 0);
                             }])
                             ->get();

        return response()->json([
            'success' => true,
            'pharmacies' => $pharmacies->map(function ($pharmacy) {
                return [
                    'id' => $pharmacy->id_pharmacy,
                    'name' => $pharmacy->name,
                    'address' => $pharmacy->address,
                    'phone' => $pharmacy->phone,
                    'whatsapp' => $pharmacy->whatsapp,
                    'whatsapp_link' => $pharmacy->whatsapp_link,
                    'distance' => round($pharmacy->distance ?? 0, 2),
                    'is_open_now' => $pharmacy->is_open_now,
                    'medicines_count' => $pharmacy->medicines->count(),
                    'image_url' => $pharmacy->image_url,
                    'url' => route('pharmacies.show', $pharmacy->id_pharmacy)
                ];
            })
        ]);
    }

    public function getWhatsAppLink($id, Request $request)
    {
        $pharmacy = Pharmacy::active()->findOrFail($id);
        
        $message = $request->get('message', '');
        if (empty($message)) {
            $message = "Hello, I would like to inquire about medicine availability at {$pharmacy->name}.";
        }

        $whatsappLink = $pharmacy->whatsapp_link . '?text=' . urlencode($message);
        
        return response()->json([
            'success' => true,
            'whatsapp_link' => $whatsappLink,
            'pharmacy_name' => $pharmacy->name
        ]);
    }
}