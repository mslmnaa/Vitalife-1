<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountUserController extends Controller 
{ 
    public function index() 
    { 
        $users = User::all(); 
        return view('admin.accountuser', compact('users')); 
    }

    public function create()
    {
        return view('admin.account.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal membuat akun. Periksa kembali data yang dimasukkan.');
        }

        try {
            // Buat user baru
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.account.index')
                ->with('success', 'Akun berhasil dibuat!');

        } catch (\Exception $e) {
            // Jika terjadi error saat menyimpan
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal membuat akun. Terjadi kesalahan pada sistem.');
        }
    }
}