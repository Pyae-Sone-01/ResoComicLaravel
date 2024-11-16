<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['web']], function() {

    Route::redirect('login', '/letadminin');

    Route::controller(LoginController::class)->group(function () {

        Route::get('letadminin',  'showLoginForm')->name('login');
        Route::post('letadminin',  'login')->name('post.login');
        Route::post('logout',  'logout')->name('logout');

    });

});

Route::get('admin/{path}', function () {
    return redirect()->route('login');
})->where('path', '.*');

// Route::view('/{any}', 'errors.404')->where('any', '.*');