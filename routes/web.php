<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about/', function () {
    return view('about');
});

Route::get('/login/', function () {
    return view('login');
});

Route::get('/category', [Controller::class, 'category'])->name('category');

Route::get('/news/category/{categoryId}', [Controller::class, 'allByCategory'])->name('category.news');

Route::get('/news/{id}', [Controller::class, 'newsOne'])->name('news.id');

Route::get('/news', [Controller::class, 'newsAll']);

Route::fallback(function (){
    echo "<h1 align='center'>Акела промахнулся!</h1>";
});
