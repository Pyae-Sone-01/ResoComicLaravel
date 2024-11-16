<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\FileManagerController;
use App\Http\Controllers\Admin\LocalizationController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth', 'localizer'], 'as' => 'admin.'],  function () {

    Route::get('/', function () {
        return redirect('admin/dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for DashboardController
    |--------------------------------------------------------------------------
    */
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | This is the route for Resource
    |--------------------------------------------------------------------------
     */
    Route::resources([
        'user'              => UserController::class,
        'permission'        => PermissionController::class,
        'role'              => RoleController::class,
        'blog-category'     => BlogCategoryController::class,
        'blog'              => BlogController::class,
    ]);


    /*
    |--------------------------------------------------------------------------
    | This is the route for BlogController
    |--------------------------------------------------------------------------
     */
    Route::post('blog/update-status', [BlogController::class, 'updateStatus']);
    Route::post('blog/update-sort', [BlogController::class, 'updateSort']);

    /*
    |--------------------------------------------------------------------------
    | This is the route for BlogCategoryController
    |--------------------------------------------------------------------------
     */
    Route::post('blog-category/update-status', [BlogCategoryController::class, 'updateStatus']);
    Route::post('blog-category/update-sort', [BlogCategoryController::class, 'updateSort']);
    /*

    |--------------------------------------------------------------------------
    | This is the route for FileManagerController
    |--------------------------------------------------------------------------
     */
    Route::get('filemanager', [FileManagerController::class, 'index'])->name('file.manager.index');

    /*
    |--------------------------------------------------------------------------
    | This is the route for ActivityLogsController
    |--------------------------------------------------------------------------
     */
    Route::controller(ActivityLogController::class)->group(function () {
        Route::get('activity-log', 'index')->name('activity.log.index');
        Route::get('activity-log/{id}', 'show')->name('activity.log.show');
        Route::delete('activity-log/{id}', 'delete')->name('activity.log.delete');
    });
    /*
    |--------------------------------------------------------------------------
    | This is the route for LocalizationController
    |--------------------------------------------------------------------------
    */
    Route::get('lang/{lang}', [LocalizationController::class, 'changeTo'])->name('lang.change');
});
