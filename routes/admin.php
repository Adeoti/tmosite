<?php


use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqItemController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'show'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.attempt');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('bookings')->name('bookings.')->group(function () {
            Route::get('/', [BookingController::class, 'index'])->name('index');
            Route::post('{booking}/confirm', [BookingController::class, 'confirm'])->name('confirm');
            Route::post('{booking}/cancel', [BookingController::class, 'cancel'])->name('cancel');
        });

        Route::resource('hero-slides', HeroSlideController::class)->except('show');
        Route::resource('portfolio-categories', PortfolioCategoryController::class)->except('show');
        Route::resource('portfolio', PortfolioController::class)->except('show');
        Route::resource('blog-categories', BlogCategoryController::class)->except('show');
        Route::resource('blog-posts', BlogPostController::class)->except('show');
        Route::resource('testimonials', TestimonialController::class)->except('show');
        Route::resource('team-members', TeamMemberController::class)->except('show');
        Route::resource('faq-items', FaqItemController::class)->except('show');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
        Route::put('settings/password', [SettingController::class, 'updatePassword'])->name('settings.password');
    });
});