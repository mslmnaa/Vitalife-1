<?php

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TripayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpesialisController;
use App\Http\Controllers\HealthChatController;
use App\Http\Controllers\AccountUserController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\VoucherUserController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\MedicineUserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserMedicineController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\TransactionUserController;
use App\Http\Controllers\Admin\SpesialisisController;
use App\Http\Controllers\Admin\AdminPharmacyController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Mail;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/









// Redirect root and register to dashboard routes
Route::get('/', function () {
    return redirect()->route('dashboard');
});



// Route::get('/register', function () {
//     return view('auth.register');
// });


// Public routes - accessible without authentication
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/aboutUs', function () {
    return view('user.aboutUs');
})->name('aboutus');

Route::get('/service', function () {
    return view('user.service');
})->name('service');




Route::get('/dayatganteng', function () {
    return view('bidan.bidan');
});
Route::get('/dayatganteng-admin', function () {
    return view('bidan.admin');
});
Route::get('/dayatganteng-admin2', function () {
    return view('bidan.admin2');
});






Route::prefix('medicines')->name('medicines.')->group(function () {
    Route::get('/', [MedicineController::class, 'index'])->name('index');
    Route::get('/{medicine}', [MedicineController::class, 'show'])->name('show');
});

// Dashboard - allow public access but modify content based on auth status
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('block.dokter')
    ->name('dashboard');



// Authentication routes
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');



// User authenticated routes
Route::middleware('auth')->group(function () {
    // Profile routes - ensure these are protected
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
        Route::post('/image', [ProfileController::class, 'updateImage'])->name('profile.update.image');
        Route::post('/image/remove', [ProfileController::class, 'removeImage'])->name('profile.remove.image');

    });

    Route::prefix('pharmacies')->name('pharmacies.')->group(function () {
    Route::get('/pharmacy', [PharmacyController::class, 'index'])->name('index');
    Route::get('/{id}', [PharmacyController::class, 'show'])->name('show')->where('id', '[0-9]+');
    Route::get('/medicine-checker', [PharmacyController::class, 'checkMedicine'])->name('medicine-checker');
    Route::get('/nearby', [PharmacyController::class, 'nearby'])->name('nearby');
    Route::POST('/{id}/whatsapp', [PharmacyController::class, 'getWhatsAppLink'])->name('whatsapp')->where('id', '[0-9]+');
});


    Route::get('/payment-history', [PaymentHistoryController::class, 'index'])
        ->name('payment-history.index');
    
    Route::get('/payment-history/{id}', [PaymentHistoryController::class, 'show'])
        ->name('payment-history.show');
    
    Route::get('/chat/available-doctors', [PaymentHistoryController::class, 'getConfirmedPayments'])
        ->name('chat.available-doctors');




    Route::post('/health-chat/response', [HealthChatController::class, 'getResponse'])
        ->name('health-chat.response')
        ->middleware(['web']);

    // ===== CHAT ROUTES =====
    // IMPORTANT: Put specific routes BEFORE parameterized routes
    Route::prefix('chat')->name('chat.')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('index');
        
        // Debug routes - put these BEFORE the parameterized route
        Route::get('/debug/unread', function() {
            $user = auth()->user();
            $unreadCount = \App\Models\Chat::where('receiver_id', $user->id)
                ->where('is_read', false)
                ->count();
            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'unread_count' => $unreadCount,
                'timestamp' => now()
            ]);
        })->name('debug.unread');
        
        // API routes - put these BEFORE the parameterized route
        Route::get('/unread', [ChatController::class, 'getUnreadCount'])->name('unread');
        Route::post('/send', [ChatController::class, 'store'])->name('store');
        
        // Parameterized route - put this LAST
        Route::get('/room/{payment_id}', [ChatController::class, 'show'])
            ->name('show')
            ->where('payment_id', '[0-9]+'); // Only allow numeric IDs
    });


    Route::prefix('tripay')->name('tripay.')->group(function () {
    Route::get('/channels', [TripayController::class, 'getPaymentChannels'])->name('channels');
    Route::post('/callback', [TripayController::class, 'callback'])->name('callback');
    Route::get('/return', [TripayController::class, 'return'])->name('return');
});

    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::put('/payments/{payment}/status', [PaymentController::class, 'updateStatus'])->name('payments.update.status');
    // Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    // Route::put('/payments/{payment}/status', [PaymentController::class, 'updateStatus'])->name('payments.update.status');
    // Route::post('/tripay/create-transaction', [TripayController::class, 'createTransaction'])->name('tripay.create');


    // Notification routes
    Route::get('/notifications', [NotificationController::class, 'getNotifications']);
    Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead']);

    // User features
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::get('/events/search', [EventController::class, 'search'])->name('search.events');
    Route::get('/detailEvent', function () {
        return view('user.detailEvent');
    });

    // Routes untuk voucher pada halaman user
    Route::get('/vouchers', [VoucherUserController::class, 'index'])->name('user.vouchers.index');
    Route::get('/vouchers/{id}', [VoucherUserController::class, 'show'])->name('user.vouchers.show');
    


    // ===== USER MEDICINE ROUTES =====
    // Routes untuk user melihat dan membeli obat
    Route::prefix('user')->name('user.')->group(function () {
        // Medicine routes
        Route::get('/medicines', [MedicineUserController::class, 'index'])->name('medicines.index');
        Route::get('/medicines/{id}', [MedicineUserController::class, 'show'])->name('medicines.show');
        
        
        // Transaction routes
        Route::get('/transactions', [TransactionUserController::class, 'index'])->name('transactions.index');
        Route::get('/transactions/{transaction}', [TransactionUserController::class, 'show'])->name('transactions.show');
        Route::post('/transactions/{transaction}/cancel', [TransactionUserController::class, 'cancel'])->name('transactions.cancel');
    });

   Route::get('/spesialis', [SpesialisController::class, 'showSpes'])->name('spesialis');
    Route::get('/spesialisFilter', [SpesialisController::class, 'spesFilter'])->name('spesialisFilter');
    Route::get('/{id_spesialis}/bayar', [SpesialisController::class, 'bayar'])->name('spesialis.bayar');
    Route::get('/spesialis/{id_spesialis}/whatsapp', [SpesialisController::class, 'getWhatsAppNumber'])->name('spesialis.whatsapp');
    

    Route::get('/debug/reverb', function () {
        return view('debug.reverb');
    })->name('debug.reverb');
    
    Route::post('/debug/test-broadcast', function (Request $request) {
        try {
            $paymentId = $request->input('payment_id', 1);
            
            // Create a test chat object
            $testChat = new \App\Models\Chat([
                'payment_id' => $paymentId,
                'sender_id' => auth()->id(),
                'receiver_id' => 3, // Test receiver
                'message' => 'Test broadcast message',
                'is_read' => false
            ]);
            
            // Don't save to database, just broadcast
            $testChat->sender = auth()->user();
            
            Log::info('Testing direct broadcast with test chat:', [
                'chat_id' => $testChat->id,
                'sender_id' => $testChat->sender_id,
                'receiver_id' => $testChat->receiver_id
            ]);
            
            // Broadcast the test message
            broadcast(new \App\Events\NewChatMessage($testChat))->toOthers();
            broadcast(new \App\Events\NewChatMessage($testChat, 3))->toOthers();
            
            return response()->json([
                'success' => true,
                'message' => 'Test broadcast sent successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Test broadcast error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Test broadcast failed: ' . $e->getMessage()
            ]);
        }
    })->name('debug.test-broadcast');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/dashboard', [AdminController::class, 'Adminhomepage'])->name('dashboard');
    Route::get('/website-usage-data', [DashboardController::class, 'getWebsiteUsageData']);

    // Admin profile
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');

    // Voucher management
    Route::resource('vouchers', VoucherController::class);
    Route::post('/voucher', [VoucherController::class, 'store'])->name('voucher.store');
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher');

    // User accounts management
    Route::get('/accountuser', [AccountUserController::class, 'index'])->name('accountuser');
    Route::get('/account/create', [AdminController::class, 'create'])->name('account.create');
    Route::post('/account', [AdminController::class, 'store'])->name('account.store');
    Route::get('/account/{user}/edit', [AdminController::class, 'edit'])->name('account.edit');
    Route::put('/account/{user}', [AdminController::class, 'update'])->name('account.update');
    Route::delete('/account/{user}', [AdminController::class, 'destroy'])->name('account.destroy');

    // Feedback management
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

    // ===== MEDICINE ADMIN ROUTES =====
    // Medicine management routes
    Route::prefix('medicines')->name('medicines.')->group(function () {
        Route::get('/', [MedicineController::class, 'adminIndex'])->name('index');
        Route::get('/create', [MedicineController::class, 'create'])->name('create');
        Route::post('/', [MedicineController::class, 'store'])->name('store');
        Route::get('/{medicine}', [MedicineController::class, 'show'])->name('show');
        Route::get('/{medicine}/edit', [MedicineController::class, 'edit'])->name('edit');
        Route::put('/{medicine}', [MedicineController::class, 'update'])->name('update');
        Route::delete('/{medicine}', [MedicineController::class, 'destroy'])->name('destroy');

        // Additional medicine routes
        Route::patch('/{medicine}/stock', [MedicineController::class, 'updateStock'])->name('update-stock');
        Route::get('/reports/low-stock', [MedicineController::class, 'lowStock'])->name('low-stock');
        Route::get('/reports/expiring-soon', [MedicineController::class, 'expiringSoon'])->name('expiring-soon');
        Route::get('/reports/expired', [MedicineController::class, 'expired'])->name('expired');
        Route::get('/reports/statistics', [MedicineController::class, 'statistics'])->name('statistics');
        Route::get('/export/csv', [MedicineController::class, 'export'])->name('export');
    });

    // ===== SPECIALIST ADMIN ROUTES =====
    // Specialist management routes - FIXED
    Route::prefix('spesialisis')->name('spesialisis.')->group(function () {
        Route::get('/', [SpesialisisController::class, 'index'])->name('index');
        Route::get('/create', [SpesialisisController::class, 'create'])->name('create');
        Route::post('/', [SpesialisisController::class, 'store'])->name('store');
        Route::get('/{id_spesialis}', [SpesialisisController::class, 'show'])->name('show');
        Route::get('/{id_spesialis}/edit', [SpesialisisController::class, 'edit'])->name('edit');
        Route::put('/{id_spesialis}', [SpesialisisController::class, 'update'])->name('update');
        Route::delete('/{id_spesialis}', [SpesialisisController::class, 'destroy'])->name('destroy');
    });

    // Legacy specialist routes (keep for backward compatibility)
    Route::get('/formspesialis', [SpesialisController::class, 'create'])->name('formspesialis');
    Route::post('/spesialis', [SpesialisController::class, 'store'])->name('spesialis.store');

    // Event management
    Route::get('/event', [EventController::class, 'adminIndex'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id_event}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{id_event}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{id_event}', [EventController::class, 'destroy'])->name('event.destroy');


    Route::resource('/admin/pharmacies', AdminPharmacyController::class);
    Route::patch('pharmacies/{pharmacy}/toggle-status', [AdminPharmacyController::class, 'toggleStatus'])
         ->name('pharmacies.toggle-status');

});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
});

// Ganti bagian doctor routes ini:
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Doctor Routes - HAPUS middleware('role:dokter')
    Route::prefix('doctor')->name('doctor.')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');
        
        // Patients Management
        Route::get('/patients', [DoctorController::class, 'patients'])->name('patients');
        Route::get('/patient/{payment}', [DoctorController::class, 'patientDetail'])->name('patient.detail');
        
        // Chat Management
        Route::get('/chats', [DoctorController::class, 'chats'])->name('chats');
        Route::get('/chat/{payment}', [DoctorController::class, 'chatDetail'])->name('chat.detail');
        Route::post('/chat/{payment}/send', [DoctorController::class, 'sendMessage'])->name('chat.send');
        
        // Profile Management
        Route::get('/profile', [DoctorController::class, 'profile'])->name('profile');
        Route::put('/profile', [DoctorController::class, 'updateProfile'])->name('profile.update');

        Route::post('/toggle-online', [DoctorController::class, 'toggleOnline'])->name('doctor.toggleOnline');

        
    });
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/account', [AccountUserController::class, 'index'])->name('account.index');
    Route::get('/account/create', [AccountUserController::class, 'create'])->name('account.create');
    Route::post('/account/store', [AccountUserController::class, 'store'])->name('account.store');
});

// Broadcasting routes
Broadcast::routes(['middleware' => ['auth']]);




Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');






Route::get('/test-email', function () {
    Mail::to('alfatiktok02@gmail.com')->send(new \App\Mail\WelcomeEmail((object)[
        'name' => 'Test User'
    ]));

    return 'Email sent';
});


Route::get('/unsubscribe', function () {
    return view('emails.unsubscribe');
});

Route::post('/admin/apply-voucher', [VoucherController::class, 'apply'])->name('admin.apply.voucher');
    Route::post('/remove-voucher', [VoucherController::class, 'removeVoucher'])->name('admin.remove.voucher');



// Include authentication routes from auth.php
require __DIR__ . '/auth.php';
