<h1 dir="rtl" align="right">Routing در لاراول</h1>
<p>در لاراول رَوتینگ (Routing) یکی از مهم‌ترین بخش‌های فریم‌ورک است که مسیرهای مختلف درخواست‌های وب را مدیریت می‌کند. یعنی تعیین می‌کند وقتی کاربر به یک آدرس خاص در سایت مراجعه کرد، چه عملی انجام شود یا چه کنترلی اجرا گردد.</p>
  
<h1 dir="rtl" align="right">📌 انواع Route در لاراول</h1>
<h3 dir="rtl" align="right">1️⃣ Basic Route (مسیر ساده)</h3>
  
  ```
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return 'صفحه اصلی';
});
```
<li dir="rtl" align="right">مسیر بالا با متد GET تعریف شده و در زمان درخواست به /home، متن «صفحه اصلی» نمایش داده می‌شود.</li>

<h3 dir="rtl" align="right">2️⃣ Route با کنترلر</h3>

  ```
Route::get('/about', [PageController::class, 'about']);
```
<li dir="rtl" align="right">به جای کلوزر، یک کنترلر و متد خاص را صدا می‌زند.</li>
<li dir="rtl" align="right">این کد فرض می‌کند که کلاس PageController و متد about در آن تعریف شده‌اند.</li>

<h3 dir="rtl" align="right">3️⃣ Route‌های POST، PUT، DELETE و ...</h3>

```
Route::post('/submit', [FormController::class, 'submit']);
Route::put('/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/{id}', [UserController::class, 'destroy']);
```
<li dir="rtl" align="right">برای مدیریت فرم‌ها و عملیات‌های دیگر.</li>

<h3 dir="rtl" align="right">4️⃣ Route با پارامتر</h3>

```
Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});
```
<li dir="rtl" align="right">پارامتر اجباری {id} در مسیر تعریف می‌شود.</li>
<h5 dir="rtl" align="right">✔️ پارامتر اختیاری:</h5>

```
Route::get('/user/{name?}', function ($name = 'Guest') {
    return $name;
});
```

<h3 dir="rtl" align="right">5️⃣ Route Name (نام‌گذاری مسیر)</h3>
<p dir="rtl" align="right">برای استفاده راحت‌تر (مثلاً در لینک‌ها یا ری‌دایرکت‌ها) مسیرها را می‌توان نام‌گذاری کرد:</p>

```
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
return redirect()->route('dashboard');
```

<h3 dir="rtl" align="right">6️⃣ گروه‌بندی مسیرها (Route Groups)</h3>
<p dir="rtl" align="right">برای اعمال یکسری تنظیمات مثل میدلور، prefix و... روی چندین مسیر به طور همزمان:</p>

```
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/users', [AdminController::class, 'users']);
});
```
<li dir="rtl" align="right">مسیر بالا معادل /admin/dashboard و /admin/users است.</li>
<li dir="rtl" align="right">میدلور auth روی هر دو مسیر اعمال می‌شود.</li>

<h3 dir="rtl" align="right">7️⃣ Route Resource (برای CRUD)</h3>
<p dir="rtl" align="right">لاراول با یک خط کد مسیرهای CRUD را تولید می‌کند:</p>

```
Route::resource('products', ProductController::class);
```
<p dir="rtl" align="right">این دستور مسیرهای زیر را به طور خودکار ایجاد می‌کند:</p>
<li dir="rtl" align="right">GET /products ➔ index</li>
<li dir="rtl" align="right">GET /products/create ➔ create</li>
<li dir="rtl" align="right">POST /products ➔ store</li>
<li dir="rtl" align="right">GET /products/{id} ➔ show</li>
<li dir="rtl" align="right">GET /products/{id}/edit ➔ edit</li>
<li dir="rtl" align="right">PUT/PATCH /products/{id} ➔ update</li>
<li dir="rtl" align="right">DELETE /products/{id} ➔ destroy</li>
<p dir="rtl" align="right">✔️ برای مسیرهای خاص هم می‌توان از only یا except استفاده کرد:</p>

```
Route::resource('products', ProductController::class)->only(['index', 'show']);
```

<h3 dir="rtl" align="right">8️⃣ Route Middleware (میدلور در مسیر)</h3>
<p dir="rtl" align="right">اعمال میدلور روی مسیر:</p>

```
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
```

<h3 dir="rtl" align="right">9️⃣ Route Fallback (زمانی که مسیر پیدا نشد)</h3>
<p dir="rtl" align="right">برای هندل کردن مسیرهای اشتباه:</p>

```
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
```

<h1 dir="rtl" align="right">📂 فایل‌های مربوط به Route در لاراول</h1>
<li dir="rtl" align="right">routes/web.php : مسیرهای مخصوص بخش وب (با session و csrf)</li>
<li dir="rtl" align="right">routes/api.php : مسیرهای API (بدون session و csrf)</li>
<li dir="rtl" align="right">routes/console.php و routes/channels.php : مسیرهای کنسول و broadcasting</li>

<h1 dir="rtl" align="right">✅ نکات تکمیلی:</h1>
<li dir="rtl" align="right">متدهای مسیر:</li>
<li dir="rtl" align="right">Route::get()</li>
<li dir="rtl" align="right">Route::post()</li>
<li dir="rtl" align="right">Route::put()</li>
<li dir="rtl" align="right">Route::delete()</li>
<li dir="rtl" align="right">Route::patch()</li>
<li dir="rtl" align="right">Route::options()</li>
<li dir="rtl" align="right">Route::match(['get', 'post'], 'uri', callback) (برای چند متد همزمان)</li>
<li dir="rtl" align="right">Route::any() (برای همه متدها)</li>
<li dir="rtl" align="right">استفاده از Route Cache در پروژه‌های بزرگ برای افزایش سرعت:</li>
<br>

```
php artisan route:cache
php artisan route:clear
```
