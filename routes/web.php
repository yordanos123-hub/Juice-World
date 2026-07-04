<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuiceController;
use App\Http\Controllers\OrderController;

// --- ሀ. ለማንኛውም ሰው ክፍት የሆኑ (Public) ---
Route::get('/', [JuiceController::class, 'index'])->name('dashboard');
Route::get('/branch/{id}', [JuiceController::class, 'show']);

// --- ለ. ሎጊን ላደረገ ማንኛውም ተጠቃሚ (የማዘዣ ገጽ) ---
Route::middleware('auth')->group(function () {
    // ይህ መንገድ ከአድሚን (admin) ሚድልዌር ውጭ መሆኑን እርግጠኛ ሁን!
    Route::get('/juice/{juice_id}/branch/{branch_id}/order', [OrderController::class, 'create']);
    Route::post('/order', [OrderController::class, 'store']);
    // ደንበኛው የራሱን ትዕዛዞች የሚያይበት ገጽ
    Route::get('/my-orders', [OrderController::class, 'userOrders'])->name('user.orders');
});

// --- ሐ. ለአድሚን ብቻ (Admin Only) ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/juices/create', [JuiceController::class, 'create']);
    Route::post('/juices', [JuiceController::class, 'store']);
    Route::get('/juices/{id}/edit', [JuiceController::class, 'edit']);
    Route::patch('/juices/{id}', [JuiceController::class, 'update']);
    Route::delete('/juices/{id}', [JuiceController::class, 'destroy']);

    // አድሚኑ ትዕዛዞችን የሚያይበት ገጽ
    Route::get('/admin/orders', [OrderController::class, 'index']);
    Route::patch('/admin/orders/{id}/status', [OrderController::class, 'updateStatus']);
});
// ይህ መስመር ከሌለ ሜኑ አይከፈትም
Route::get('/menu', [App\Http\Controllers\JuiceController::class, 'menu']);;
require __DIR__.'/auth.php';


