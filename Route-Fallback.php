Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
