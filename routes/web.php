<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\backend\SettingsController;
use App\Http\Controllers\frontend\PagesController;
use App\Http\Controllers\UserManagementController;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Route;



$menuItems = MenuItem::all();
foreach ($menuItems as $menu) {
    Route::get($menu->slug, [PagesController::class, 'pageShow'])->name($menu->slug)->defaults('pageName', $menu->slug);
}
Route::get('/', [PagesController::class, 'index'])->name('page.index');
Route::middleware('guest')->group(function () {


    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    // logout
    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
    // user Management
    Route::prefix('user')->group(function () {
        // Dashboard
        Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
        // user profile managament
        Route::get('/profile', [UserController::class, 'index'])->name('profile.index');
        Route::put('update-image', [UserController::class, 'imageUpdate'])->name('update.image');
        ROute::put('/update-profile', [UserController::class, 'update'])->name('profile.update');
        Route::put('/password-update', [UserController::class, 'passwordUpdate'])->name('profile.password.update');
        Route::delete('/delete-account', [UserController::class, 'destroy'])->name('delete.account');
    });
});

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('users', [UserManagementController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserManagementController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserManagementController::class, 'store'])->name('user.store');
    Route::put('/user/{user}/update', [UserManagementController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}/delete', [UserManagementController::class, 'destroy'])->name('user.destroy');
});

Route::prefix('settings')->group(function(){
    Route::get('/web-settings',[SettingsController::class,'webSettings'])->name('web.settings');
    Route::post('/update/web-settings',[SettingsController::class, 'updateWebSettings'])->name('update.web.settings');
    Route::get('/seo',[SettingsController::class,'seo'])->name('seo');
    Route::post('/update/seo',[SettingsController::class, 'updateSeo'])->name('update.seo');
    Route::get('/navbar',[SettingsController::class,'navbar'])->name('navbar');
    Route::post('/update/navbar',[SettingsController::class,'updateNavbar'])->name('update.navbar');
    Route::get('/footer',[SettingsController::class,'footer'])->name('footer');
    Route::post('/update/footer',[SettingsController::class,'updateFooter'])->name('update.footer');
    Route::get('/social-medias',[SettingsController::class,'socialMedias'])->name('social.medias');
    Route::post('/update/social-media',[SettingsController::class,'updateSocialMedia'])->name('update.social.media');
});
