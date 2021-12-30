<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StaffController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::get('home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect()->route('dashboard');
});

Route::get('/password/email', function () {
    return redirect()->route('dashboard');
});

Route::get('/password/reset', function () {
    return redirect()->route('dashboard');
});
Route::get('/register', function () {
    return redirect()->route('dashboard');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:superadmin|owner|staff']], function () {

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resources([
        'location' => LocationController::class,
        'service' => ServiceController::class,
        'category' => CategoryController::class,
        'payment' => PaymentController::class,
        'order' => OrderController::class,
        'staff' => StaffController::class,
    ]);

    Route::get('order/approve/{id}', [OrderController::class, 'approve'])->name('order.approve');

    Route::post('add-service', [OrderController::class, 'add_service'])->name('add_service');
    Route::delete('hapus-service/{id}', [OrderController::class, 'hapus_service'])->name('service.hapus');
    Route::put('update-service/{id}', [OrderController::class, 'update_service'])->name('update_service');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/home', [HomeController::class, 'addOrder'])->name('add.order');
Route::get('/booking', [HomeController::class, 'checkBooking'])->name('check.booking');

// Route::get('/', function () {
//     return view('welcome');
// });

// // Auth::routes();

// // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// // Route::view('/', 'welcome');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/home', [App\Http\Controllers\HomeController::class, 'addOrder'])->name('add.order');
// Route::get('/booking', [App\Http\Controllers\HomeController::class, 'checkBooking'])->name('check.booking');
// Route::post('/booking', [App\Http\Controllers\HomeController::class, 'bookingCheck'])->name('booking.check');
// Route::get('/booking/{kode}', [App\Http\Controllers\HomeController::class, 'booking'])->name('booking');
// Route::put('/lunas/{id}', [App\Http\Controllers\HomeController::class, 'lunas'])->name('lunas');

// Route::get('/', [FrontController::class, 'index'])->name('front');
// Route::get('/locationToService/{id}', [FrontController::class, 'locationToService'])->name('locationToService');

// Route::get('/add-to-cart/{id}', [FrontController::class, 'addToCart'])->name('addToCart');
// Route::get('/cart', [FrontController::class, 'cart'])->name('cart');
// Route::get('/delete-service/{id}', [FrontController::class, 'deleteService'])->name('deleteService');
// Route::patch('update-cart', [FrontController::class, 'update']);

// Route::get('/staff', [FrontController::class, 'staff'])->name('staff');
// Route::post('/staff', [FrontController::class, 'addStaff'])->name('addStaff');

// Route::get('/customer', [FrontController::class, 'customer'])->name('customer');
// Route::post('/customer', [FrontController::class, 'addCustomer'])->name('addCustomer');

// Route::get('/detail', [FrontController::class, 'detail'])->name('detail');

// Route::post('/payment', [FrontController::class, 'addPayment'])->name('addPayment');
// Route::get('/detail-payment/{kode}', [FrontController::class, 'detail_payment'])->name('detail_payment');
// Route::put('/upload-bukti/{id}', [FrontController::class, 'uploadBukti'])->name('uploadBukti');

// Route::get('/unset-cart', [FrontController::class, 'unsetCart'])->name('unsetCart');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/home', [App\Http\Controllers\HomeController::class, 'addOrder'])->name('add.order');
// Route::get('/booking', [App\Http\Controllers\HomeController::class, 'checkBooking'])->name('check.booking');
// Route::post('/booking', [App\Http\Controllers\HomeController::class, 'bookingCheck'])->name('booking.check');
// Route::get('/booking/{kode}', [App\Http\Controllers\HomeController::class, 'booking'])->name('booking');
// Route::put('/lunas/{id}', [App\Http\Controllers\HomeController::class, 'lunas'])->name('lunas');
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::post('/home', [HomeController::class, 'addOrder'])->name('add.order');
// Route::get('/booking', [HomeController::class, 'checkBooking'])->name('check.booking');
// Route::post('/booking', [HomeController::class, 'bookingCheck'])->name('booking.check');
// Route::get('/booking/{kode}', [HomeController::class, 'booking'])->name('booking');
// Route::put('/lunas/{id}', [HomeController::class, 'lunas'])->name('lunas');
