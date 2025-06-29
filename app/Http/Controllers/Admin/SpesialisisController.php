<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Spesialis;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SpesialisisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spesialisis = Spesialis::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.spesialisis.index', compact('spesialisis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spesialisis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'harga' => 'required|numeric|min:0',
            'spesialisasi' => 'required|string|max:255',
            'tempatTugas' => 'required|string|max:255',
            'alamat' => 'required|string',
            'noHP' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();
        
        try {
            // Generate random password
            $password = '123';
            
            // Create user account for doctor
            $user = User::create([
                'name' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'password' => Hash::make($password),
                'role' => 'dokter',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('spesialis', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Remove email from validated data for spesialis
            unset($validatedData['email']);
            
            // Add user_id to spesialis data
            $validatedData['user_id'] = $user->id;

            // Create spesialis record
            $spesialis = Spesialis::create($validatedData);

            // Send email with login credentials
            $this->sendDoctorCredentials($user, $password);

            DB::commit();

            return redirect()->route('admin.spesialisis.index')
                           ->with('success', 'Data Spesialis berhasil disimpan dan akun dokter telah dibuat.');
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()
                           ->with('error', 'Gagal menyimpan data Spesialis. Silakan coba lagi. Error: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_spesialis)
    {
        $spesialis = Spesialis::with('user')->findOrFail($id_spesialis);
        return view('admin.spesialisis.show', compact('spesialis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_spesialis)
    {
        $spesialis = Spesialis::with('user')->findOrFail($id_spesialis);
        return view('admin.spesialisis.edit', compact('spesialis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_spesialis)
    {
        $spesialis = Spesialis::with('user')->findOrFail($id_spesialis);

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $spesialis->user_id,
            'harga' => 'required|numeric|min:0',
            'spesialisasi' => 'required|string|max:255',
            'tempatTugas' => 'required|string|max:255',
            'alamat' => 'required|string',
            'noHP' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Update user data
            if ($spesialis->user) {
                $spesialis->user->update([
                    'name' => $validatedData['nama'],
                    'email' => $validatedData['email'],
                ]);
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($spesialis->image && Storage::disk('public')->exists($spesialis->image)) {
                    Storage::disk('public')->delete($spesialis->image);
                }
                
                $imagePath = $request->file('image')->store('spesialis', 'public');
                $validatedData['image'] = $imagePath;
            }

            // Remove email from validated data for spesialis
            unset($validatedData['email']);

            // Update spesialis data
            $spesialis->update($validatedData);

            DB::commit();

            return redirect()->route('admin.spesialisis.index')
                           ->with('success', 'Data Spesialis berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()
                           ->with('error', 'Gagal memperbarui data Spesialis. Silakan coba lagi. Error: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_spesialis)
    {
        DB::beginTransaction();
        
        try {
            $spesialis = Spesialis::with('user')->findOrFail($id_spesialis);
            
            // Delete image if exists
            if ($spesialis->image && Storage::disk('public')->exists($spesialis->image)) {
                Storage::disk('public')->delete($spesialis->image);
            }
            
            // // Delete associated user account
            // if ($spesialis->user) {
            //     $spesialis->user->delete();
            // }
            
            // Delete spesialis record
            $spesialis->delete();
            // $spesialis->delete(); // hapus dulu spesialis
            $spesialis->user->delete(); // lalu hapus user

            DB::commit();
            
            return redirect()->route('admin.spesialisis.index')
                           ->with('success', 'Data Spesialis dan akun dokter berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            
            return redirect()->back()
                           ->with('error', 'Gagal menghapus data Spesialis. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }

    /**
     * Send doctor credentials via email
     */
    private function sendDoctorCredentials($user, $password)
    {
        try {
            // Simple email sending - you can customize this based on your email setup
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $password,
                'login_url' => route('login')
            ];

            
            Mail::send('emails.doctor-credentials', $data, function($message) use ($user) {
                $message->to($user->email, $user->name)
                        ->subject('Akun Dokter Vitalife - Kredensial Login');
            });
            

            // For now, we'll just log the credentials (remove this in production)
            Log::info('Doctor credentials created', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $password
            ]);

        } catch (\Exception $e) {
            \Log::error('Failed to send doctor credentials: ' . $e->getMessage());
        }
    }
}