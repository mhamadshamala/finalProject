<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    $categories = Category::get();
    $firstCategory = Category::where('id', 1)->first();
    $secondCategory = Category::where('id', 2)->first();

    $start = Carbon::now()->subWeek()->startOfWeek();
    $end = Carbon::now()->subWeek()->endOfWeek();
    $firstProducts = Product::where('category_id', 1)->where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->take(4)->get();
    $secondProducts = Product::where('category_id', 2)->where('created_at', ">", DB::raw('NOW() - INTERVAL 1 WEEK'))->take(4)->get();

    return view('welcome', [
        'categories' => $categories,
        'firstCategory' => $firstCategory,
        'firstProducts' => $firstProducts,
        'secondCategory' => $secondCategory,
        'secondProducts' => $secondProducts


    ]);
});
Route::get('/about', function () {
    $abouts = About::get();
    return view('about', [
        'abouts' => $abouts
    ]);
});
Route::get('/contact', function () {
    return view('contact');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/products', [ProductController::class, 'index']);
Route::get('/admin/products/create', [ProductController::class, 'create']);
Route::post('/admin/products/store', [ProductController::class, 'store']);
Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete']);
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('edit-product');
Route::put('/admin/products/update/{id}', [ProductController::class, 'update'])->name('update-product');

Route::get('/categories/index',[CategoriesController::class, 'index'])->name('index-categories');
Route::get('/categories/create',[CategoriesController::class, 'create'])->name('create-categories');
Route::post('/categories/store',[CategoriesController::class, 'store'])->name('store-categories');

Route::get('/about/index',[AboutController::class, 'index'])->name('index-about');
Route::get('/about/create',[AboutController::class, 'create'])->name('create-about');
Route::post('/about/store',[AboutController::class, 'store'])->name('store-about');



Route::get('/contact', [ContactController::class, 'index']);
Route::get('/contact/index',[ContactController::class, 'index'])->name('index-contact');
Route::get('/contact/create',[ContactController::class, 'create'])->name('create-contact');
Route::post('/contact/store',[ContactController::class, 'store'])->name('store-contact');


Route::post('/store',[ContactController::class, 'store']);

Route::get('/{contact}/edit','ContactController@edit');

Route::post('/update/{contact}',[ContactController::class, 'update']);

Route::delete('delete/{id}',[ContactController::class, 'delete']);
