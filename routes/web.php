<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EnqueryConrtoller;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\CmsController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ForgotPasswordController;
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
    Route::get('/', [AuthController::class, 'redirectAdminLogin']);
    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
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

    Route::prefix('orders')->name('orders.')->group(function () {
        // order
        Route::get('/list', [AdminOrderController::class, 'index'])->name('index');
        Route::get('/hold-order', [AdminOrderController::class, 'holdOrder'])->name('hold');
        // active order
        Route::get('/active-order/{id}', [AdminOrderController::class, 'activeOrder'])->name('active.order');
        Route::get('/resend-voucher/{id}', [AdminOrderController::class, 'resendVoucher'])->name('resend.voucher');
        Route::get('/download.voucher/{id}', [AdminOrderController::class, 'downloadVoucher'])->name('download.voucher');
        Route::get('/view/{id}', [AdminOrderController::class, 'view'])->name('view');
        Route::get('/edit/{id}', [AdminOrderController::class, 'edit'])->name('edit');
        Route::post('/update', [AdminOrderController::class, 'update'])->name('update');
    });

    // enquiry
    Route::prefix('enquiry')->name('enquiry.')->group(function () {
        Route::get('/', [EnqueryConrtoller::class, 'enquiry'])->name('index');
    });

    // call back
    Route::prefix('callback')->name('callback.')->group(function () {
        Route::get('/', [EnqueryConrtoller::class, 'callback'])->name('index');
        Route::post('/status', [EnqueryConrtoller::class, 'status'])->name('status');
    });

    Route::prefix('newsletter')->name('newsletter.')->group(function () {
        Route::get('/', [NewsletterController::class, 'newsletter'])->name('index');
    });
    
});


Route::get('login', [UserAuthController::class, 'login'])->name('login');
Route::get('register', [UserAuthController::class, 'register'])->name('register');
Route::post('register-store', [UserAuthController::class, 'registerStore'])->name('register.store');
Route::post('login-check', [UserAuthController::class, 'loginCheck'])->name('login.check');
Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');

Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forget.password'); // forget password
Route::post('/forget-password-check', [ForgotPasswordController::class, 'forgetPasswordCheck'])->name('forget.password.check'); // forget password check
Route::get('/reset-password/{id}/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password'); // reset password
Route::post('/reset-password-check', [ForgotPasswordController::class, 'resetPasswordCheck'])->name('reset.password.check'); // reset password check

// home route
Route::get('/', [CmsController::class, 'index'])->name('home');
// about us
Route::get('about-us', [CmsController::class, 'aboutUs'])->name('about-us');
// how it works
Route::get('how-it-works', [CmsController::class, 'howItWorks'])->name('how-it-works');
// our hotels
Route::get('our-hotels', [CmsController::class, 'ourHotels'])->name('our-hotels');
// privacy policy
Route::get('privacy-policy', [CmsController::class, 'privacyPolicy'])->name('privacy-policy');
// terms and conditions
Route::get('terms-and-conditions', [CmsController::class, 'termsAndConditions'])->name('terms-and-conditions');
// australia
Route::get('australia', [CmsController::class, 'australia'])->name('australia');
// aus to new zealand
Route::get('aus-to-new-zealand', [CmsController::class, 'ausToNewZealand'])->name('aus-to-new-zealand');
// New Zealand
Route::get('new-zealand-to-bali', [CmsController::class, 'newZealandToBali'])->name('new-zealand-to-bali');
// newsletter
Route::post('newsletter', [CmsController::class, 'newsletter'])->name('newsletter');

// Bali
Route::get('bali', [CmsController::class, 'bali'])->name('bali');

// our package routes
Route::get('our-package', [PackageController::class, 'ourPackage'])->name('our-package');
Route::get('package/{id}', [PackageController::class, 'package'])->name('package');
// cart page
Route::get('cart', [CartController::class, 'cart'])->name('cart');
// add to cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('remove-cart', [CartController::class, 'cartRemove'])->name('frontend.cart.remove');
Route::post('book-hotel', [BookController::class, 'bookHotel'])->name('book.hotel');

Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('checkout-store', [OrderController::class, 'checkoutStore'])->name('checkout.store');
// success payment
Route::get('success', [OrderController::class, 'success'])->name('payment.success');
// cancel payment
Route::get('cancel', [OrderController::class, 'cancel'])->name('payment.cancel');

Route::post('save-address', [OrderController::class, 'saveAddress'])->name('save.address');

Route::middleware('user')->group(function () {
   
    // hold order profilecontroller
    Route::get('hold-order', [UserProfileController::class, 'holdOrder'])->name('hold.order');
    // order details
    Route::get('orders', [UserProfileController::class, 'orders'])->name('orders');
    // profile
    Route::get('profile', [UserProfileController::class, 'profile'])->name('profile');
    Route::post('profile-update', [UserProfileController::class, 'profileUpdate'])->name('profile.update');
    
    Route::get('resend-mail/{id}', [UserProfileController::class, 'resendMil'])->name('resend.mail');
    Route::get('download-pdf/{id}', [UserProfileController::class, 'downloadPdf'])->name('download.pdf');
    // change password
    Route::get('change-password', [UserProfileController::class, 'changePassword'])->name('change.password');
    Route::post('change-password-update', [UserProfileController::class, 'changePasswordUpdate'])->name('change.password.update');
});
