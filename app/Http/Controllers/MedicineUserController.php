<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineUserController extends Controller
{
    public function index(Request $request)
    {
        $query = Medicine::available(); // Menggunakan scope yang sudah ada di model

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->get('search');
            $query->search($search); // Menggunakan scope search yang sudah ada
        }

        // Category filter
        if ($request->has('kategori') && $request->kategori != '') {
            $query->byCategory($request->get('kategori')); // Menggunakan scope byCategory
        }

        // Manufacturer filter
        if ($request->has('produsen') && $request->produsen != '') {
            $query->byManufacturer($request->get('produsen')); // Menggunakan scope byManufacturer
        }

        $medicines = $query->orderBy('nama')->paginate(12);
        $categories = Medicine::getCategories(); // Menggunakan static method yang sudah ada
        $manufacturers = Medicine::getManufacturers(); // Menggunakan static method yang sudah ada

        return view('user.medicines.index', compact('medicines', 'categories', 'manufacturers'));
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('user.medicines.show', compact('medicine'));
    }

   
}
