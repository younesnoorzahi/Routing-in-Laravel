Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
