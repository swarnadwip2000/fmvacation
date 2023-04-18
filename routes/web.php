<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Frontend\CmsController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PackageController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use Illuminate\Support\Facades\Artisan;

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

// Clear cache
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    return "Optimize clear has been successfully";
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('admin.login.check');  //login check
    Route::post('forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('admin.forget.password');
    Route::post('change-password', [ForgetPasswordController::class, 'changePassword'])->name('admin.change.password');
    Route::get('forget-password/show', [ForgetPasswordController::class, 'forgetPasswordShow'])->name('admin.forget.password.show');
    Route::get('reset-password/{id}/{token}', [ForgetPasswordController::class, 'resetPassword'])->name('admin.reset.password');
    Route::post('change-password', [ForgetPasswordController::class, 'changePassword'])->name('admin.change.password');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::prefix('password')->group(function () {
        Route::get('/', [ProfileController::class, 'password'])->name('admin.password'); // password change
        Route::post('/update', [ProfileController::class, 'passwordUpdate'])->name('admin.password.update'); // password update
    });

    Route::resources([
        'customers' => CustomerController::class,
    ]);
    //  Customer Routes
    Route::prefix('customers')->group(function () {
        Route::get('/customer-delete/{id}', [CustomerController::class, 'delete'])->name('customers.delete');
    });
    Route::get('/changeCustomerStatus', [CustomerController::class, 'changeCustomersStatus'])->name('customers.change-status');
});


Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::get('register', [UserAuthController::class, 'register'])->name('register');
Route::post('register-store', [UserAuthController::class, 'registerStore'])->name('register.store');
Route::post('login-check', [UserAuthController::class, 'loginCheck'])->name('login.check');
Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');

// home route
Route::get('/', [CmsController::class, 'index'])->name('home');
// about us
Route::get('about-us', [CmsController::class, 'aboutUs'])->name('about-us');
// how it works
Route::get('how-it-works', [CmsController::class, 'howItWorks'])->name('how-it-works');
// our hotels
Route::get('our-hotels', [CmsController::class, 'ourHotels'])->name('our-hotels');
// our package routes
Route::get('our-package', [PackageController::class, 'ourPackage'])->name('our-package');
Route::get('package/{id}', [PackageController::class, 'package'])->name('package');
// cart page
Route::get('cart', [CartController::class, 'cart'])->name('cart');
// add to cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('remove-cart', [CartController::class, 'cartRemove'])->name('frontend.cart.remove');

Route::middleware('user')->group(function () {
    Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('checkout-store', [OrderController::class, 'checkoutStore'])->name('checkout.store');
    // success payment
    Route::get('success', [OrderController::class, 'success'])->name('payment.success');
    // cancel payment
    Route::get('cancel', [OrderController::class, 'cancel'])->name('payment.cancel');

    Route::post('save-address', [OrderController::class, 'saveAddress'])->name('save.address');
    // hold order profilecontroller
    Route::get('hold-order', [UserProfileController::class, 'holdOrder'])->name('hold.order');
    // order details
    Route::get('orders', [UserProfileController::class, 'orders'])->name('orders');
    // profile
    Route::get('profile', [UserProfileController::class, 'profile'])->name('profile');
    Route::post('profile-update', [UserProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::get('active-order/{id}', [UserProfileController::class, 'activeOrder'])->name('active.order');
    Route::get('resend-mail/{id}', [UserProfileController::class, 'resendMil'])->name('resend.mail');
    Route::get('download-pdf/{id}', [UserProfileController::class, 'downloadPdf'])->name('download.pdf');
    // change password
    Route::get('change-password', [UserProfileController::class, 'changePassword'])->name('change.password');
    Route::post('change-password-update', [UserProfileController::class, 'changePasswordUpdate'])->name('change.password.update');
});
