<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminParserController;
use App\Http\Controllers\Admin\AdminSourceController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about/', function () {
    return view('about');
})->name('about');

Route::get('/login/', function () {
    return view('login');
})->name('login');

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/news/category/{categoryId}', [NewsController::class, 'allByCategory'])->name('category.news');
Route::get('/news/{id}', [NewsController::class, 'one'])->name('news.id');
Route::get('/news', [NewsController::class, 'all'])->name('news');

Route::prefix('/feedback')->group(function () {
    Route::get('/', [FeedbackController::class, 'index'])->name('feedback');
    Route::post('/store', [FeedbackController::class, 'store'])->name('feedback.store');
});

Route::prefix('/order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order');
    Route::post('/store', [OrderController::class, 'store'])->name('order.store');
});

Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::resource('news', AdminNewsController::class);
    Route::resource('feedback', AdminFeedbackController::class)->except('store');
    Route::resource('order', AdminOrderController::class)->except('store');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('source', AdminSourceController::class);

    Route::get('/parser', [AdminParserController::class, 'index'])->name('parser');

    Route::middleware('is.admin')->group(function () {
        Route::resource('user', AdminUserController::class);
        Route::get('user/password/{user}', [AdminUserController::class, 'password'])->name('user.password');
        Route::post('user/password/update/{user}',[AdminUserController::class, 'passwordUpdate'])->name('user.password.update');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});


Route::fallback(function () {
    echo "<h1 align='center'>Акела промахнулся!</h1>";
});

Auth::routes(['register' => false]);
