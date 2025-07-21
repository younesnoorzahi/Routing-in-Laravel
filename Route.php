<?php 

// Basic Route
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
  return 'صفحه اصلی';
});

// Route با کنترلر
Route::get('/about', [PageController::class, 'about']);

//  Route‌های POST، PUT، DELETE و ...
Route::post('/submit', [FormController::class, 'submit']);
Route::put('/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/{id}', [UserController::class, 'destroy']);

// Route با پارامتر
Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});

// پارامتر اختیاری
Route::get('/user/{name?}', function ($name = 'Guest') {
    return $name;
});

// Route Name (نام‌گذاری مسیر)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
return redirect()->route('dashboard');

// گروه‌بندی مسیرها (Route Groups)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
});

// Route Resource (برای CRUD)
Route::resource('products', ProductController::class);

// ✔️ برای مسیرهای خاص هم می‌توان از only یا except استفاده کرد:
Route::resource('products', ProductController::class)->only(['index', 'show']);

// Route Middleware (میدلور در مسیر)
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

//  Route Fallback (زمانی که مسیر پیدا نشد)
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
