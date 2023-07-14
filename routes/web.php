<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShortenedURLController;
use App\Http\Middleware\CheckDecodeShortUrlMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

// Public route
Route::middleware(['shorturl.security'])->get('st/{shortUrl}', [ShortenedURLController::class, 'decodeShortUrls']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', function () {
        Auth::logout();
        return redirect('/');
    });
    Route::middleware(['checkshortenedurl'])->post('shorturl', [ShortenedURLController::class, 'create']);
    Route::get('shorthistory', [ShortenedURLController::class, 'show'])->name('shorthistory');

    // admin routes
    Route::middleware('role_or_permission:Admin')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'show']);
    });
});
