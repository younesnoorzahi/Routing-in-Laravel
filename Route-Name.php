Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
return redirect()->route('dashboard');
