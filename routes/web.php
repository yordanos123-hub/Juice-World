<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuiceController;
use App\Http\Controllers\OrderController;

// --- 1. ለማንኛውም ሰው ክፍት የሆኑ (Public) ---
Route::get('/', [JuiceController::class, 'index'])->name('dashboard');
Route::get('/menu', [JuiceController::class, 'menu']);
Route::get('/branch/{id}', [JuiceController::class, 'show']);
Route::get('/about', [JuiceController::class, 'about']);

// --- 2. የማዘዣ ሲስተም (Guest Checkout - Register ማድረግ አይጠይቅም) ---
Route::get('/juice/{juice_id}/select-branch', [OrderController::class, 'selectBranch']);
Route::get('/juice/{juice_id}/branch/{branch_id}/order', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store']);

// 🏆 አዲሱ የክፍያ ማረጋገጫ መንገድ (Simulation)
Route::get('/payment/verify/{id}', [OrderController::class, 'verifyPayment'])->name('payment.verify');

// --- 3. ሎጊን ላደረጉ ተጠቃሚዎች ብቻ (Authenticated) ---
Route::middleware('auth')->group(function () {
    // ተጠቃሚው የራሱን ትዕዛዞች ታሪክ ለማየት
    Route::get('/my-orders', [OrderController::class, 'userOrders'])->name('user.orders');
});

// --- 4. ለአድሚን ብቻ (Admin Only) ---
Route::middleware(['auth', 'admin'])->group(function () {
    // የጁስ CRUD ስራዎች
    Route::get('/juices/create', [JuiceController::class, 'create']);
    Route::post('/juices', [JuiceController::class, 'store']);
    Route::get('/juices/{id}/edit', [JuiceController::class, 'edit']);
    Route::patch('/juices/{id}', [JuiceController::class, 'update']);
    Route::delete('/juices/{id}', [JuiceController::class, 'destroy']);

    // የትዕዛዝ መቆጣጠሪያዎች
    Route::get('/admin/orders', [OrderController::class, 'index']); // ዝርዝር ለማየት
    Route::patch('/admin/orders/{id}/status', [OrderController::class, 'updateStatus']); // ትዕዛዝ ለመቀበል
    Route::patch('/admin/orders/{id}/pay', [OrderController::class, 'markAsPaid']); // ክፍያ በእጅ ለማረጋገጥ
});

require __DIR__.'/auth.php';
