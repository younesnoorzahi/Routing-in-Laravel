# 📌 Routing در لاراول

در لاراول، **Routing** یکی از بخش‌های حیاتی است که مسیرهای مختلف درخواست‌های وب را مدیریت می‌کند؛ یعنی تعیین می‌کند وقتی کاربر به یک آدرس خاص در سایت مراجعه کرد، چه عملی انجام شود یا چه کنترلی اجرا گردد،

---

## 📚 انواع Route در لاراول

### 1️⃣ Basic Route (مسیر ساده)

```php
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return 'صفحه اصلی';
});
```

* مسیر بالا با متد GET تعریف شده و در زمان درخواست به `/home`، متن «صفحه اصلی» نمایش داده می‌شود؞

---

### 2️⃣ Route با کنترلر

```php
Route::get('/about', [PageController::class, 'about']);
```

* به جای کلوزر، یک کنترلر و متد خاص صدا زده می‌شود.
* فرض می‌شود که کلاس `PageController` و متد `about` در آن تعریف شده‌اند.

---

### 3️⃣ Route‌های POST، PUT، DELETE و ...

```php
Route::post('/submit', [FormController::class, 'submit']);
Route::put('/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/{id}', [UserController::class, 'destroy']);
```

* برای مدیریت فرم‌ها و عملیات‌های دیگر استفاده می‌شود.

---

### 4️⃣ Route با پارامتر

```php
Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});
```

* پارامتر اجباری `{id}` در مسیر تعریف می‌شود.

**پارامتر اختیاری:**

```php
Route::get('/user/{name?}', function ($name = 'Guest') {
    return $name;
});
```

---

### 5️⃣ Route Name (نام‌گذاری مسیر)

```php
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

return redirect()->route('dashboard');
```

* برای لینک‌دهی یا ری‌دایرکت راحت‌تر استفاده می‌شود.

---

### 6️⃣ گروه‌بندی مسیرها (Route Groups)

```php
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
});
```

* مسیرهای بالا معادل `/admin/dashboard` و `/admin/users` هستند.
* میدلور `auth` روی هر دو مسیر اعمال می‌شود.

---

### 7️⃣ Route Resource (برای CRUD)

```php
Route::resource('products', ProductController::class);
```

* با این کد، مسیرهای CRUD زیر به‌صورت خودکار ایجاد می‌شوند:

| Method    | URI                 | Action  |
| --------- | ------------------- | ------- |
| GET       | /products           | index   |
| GET       | /products/create    | create  |
| POST      | /products           | store   |
| GET       | /products/{id}      | show    |
| GET       | /products/{id}/edit | edit    |
| PUT/PATCH | /products/{id}      | update  |
| DELETE    | /products/{id}      | destroy |

**مسیرهای خاص:**

```php
Route::resource('products', ProductController::class)->only(['index', 'show']);
```

---

### 8️⃣ Route Middleware (میدلور در مسیر)

```php
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
```

* اعمال میدلور روی مسیر خاص.

---

### 9️⃣ Route Fallback (زمانی که مسیر پیدا نشد)

```php
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
```

* برای هندل کردن خطاهای 404 کاربرد دارد.

---

## 📂 فایل‌های مربوط به Route در لاراول

* `routes/web.php` : مسیرهای وب (session و csrf)
* `routes/api.php` : مسیرهای API (بدون session و csrf)
* `routes/console.php` و `routes/channels.php` : مسیرهای کنسول و broadcasting

---

## ✅ نکات تکمیلی

* انواع متدهای مسیر:

  * `Route::get()`
  * `Route::post()`
  * `Route::put()`
  * `Route::delete()`
  * `Route::patch()`
  * `Route::options()`
  * `Route::match(['get', 'post'], 'uri', callback)`
  * `Route::any()`

* استفاده از Route Cache برای افزایش سرعت در پروژه‌های بزرگ:

```bash
php artisan route:cache
php artisan route:clear
```

---

> تهیه‌شده توسط **[BackYoon](https://www.youtube.com/@back-yoon)** – لذت کدنویسی با لاراول 😊
