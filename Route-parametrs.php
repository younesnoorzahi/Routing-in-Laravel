Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});

<!-- پارامتر اختیاری -->
Route::get('/user/{name?}', function ($name = 'Guest') {
    return $name;
});
