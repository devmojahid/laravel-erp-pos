<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{
    Auth\LoginController,
    UserController,
    RoleController,
    StripePaymentController
};



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "Admin" middleware group. Make something great!
|
*/
Route::middleware('guest:admin')->prefix("admin")->name("admin.")->group(function(){
    Route::get('/login',[LoginController::class,'create'])->name('login');
    Route::post('/login',[LoginController::class,'store'])->name('login.store');
});

Route::middleware(['auth:admin'])->prefix("admin")->name("admin.")->group(function () {
    // Route::get("/", function () {
    //     return redirect()->route("admin.dashboard");
    // });
    Route::get('dashboard', function () {
        return view("backend.dashboard.index");
    })->name('dashboard');
    Route::post('logout',[LoginController::class,'destroy'])->name('logout');

    // user management routes
    Route::resource('users',UserController::class);

    // role management routes
    Route::resource('roles',RoleController::class);
});
// Route::group(['prefix' => 'admin/files', 'middleware' => ['auth', 'auth:admin']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });



Route::get('/payment', [StripePaymentController::class, 'showForm'])->name('payment.show');
Route::post('/payment/process', [StripePaymentController::class, 'processPayment'])->name('payment.process');
