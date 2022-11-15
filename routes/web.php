<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    // $role = Role::create(['name' => 'staff']);

    // $permission = Permission::create(['name' => 'edit articles']);
    // $role->givePermissionTo($permission);
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('user', [RegisteredUserController::class, 'index'])->name('user');
Route::post('user', [RegisteredUserController::class, 'store']);


Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('add-category', [CategoryController::class, 'create']);
Route::post('add-category', [CategoryController::class, 'store']);
Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
Route::put('update-category/{id}', [CategoryController::class, 'update']);
Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

Route::get('product', [ProductController::class, 'index'])->name('product');
Route::get('add-product', [ProductController::class, 'create']);
Route::post('add-product', [ProductController::class, 'store']);
Route::get('edit-product/{id}', [ProductController::class, 'edit']);
Route::put('update-product/{id}', [ProductController::class, 'update']);
Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
Route::get('search', [ProductController::class, 'search']);

Route::get('brand', [BrandController::class, 'index'])->name('brand');
Route::get('add-brand', [BrandController::class, 'create']);
Route::post('add-brand', [BrandController::class, 'store']);
Route::get('edit-brand/{id}', [BrandController::class, 'edit']);
Route::put('update-brand/{id}', [BrandController::class, 'update']);
Route::get('delete-brand/{id}', [BrandController::class, 'destroy']);

Route::get('stock', [StockController::class, 'index'])->name('stock');
Route::get('add-stock', [StockController::class, 'create']);
Route::post('add-stock', [StockController::class, 'store']);
Route::get('edit-stock/{id}', [StockController::class, 'edit']);
Route::put('update-stock/{id}', [StockController::class, 'update']);
Route::get('delete-stock/{id}', [StockController::class, 'destroy']);

Route::get('department', [DepartmentController::class, 'index'])->name('department');
Route::get('add-department', [DepartmentController::class, 'create']);
Route::post('add-department', [DepartmentController::class, 'store']);
Route::get('edit-department/{id}', [DepartmentController::class, 'edit']);
Route::put('update-department/{id}', [DepartmentController::class, 'update']);
Route::get('delete-department/{id}', [DepartmentController::class, 'destroy']);

// Route::post('add-department', [DepartmentController::class, 'store']);
Route::get('request', [RequestController::class, 'index'])->name('request');
// Route::post('request', [RequestController::class, 'index'])->name('request');
Route::get('add-request', [RequestController::class, 'create'])->name('request.add');
Route::post('add-request', [RequestController::class, 'store']);
Route::get('edit-request/{id}', [RequestController::class, 'edit']);
Route::put('update-request/{id}', [RequestController::class, 'update']);
Route::get('delete-request/{id}', [RequestController::class, 'destroy']);
Route::post('request/status/change', [RequestController::class, 'changeStatus'])->name("change_status");
Route::post('request/status/chan', [RequestController::class, 'chanStatus'])->name("chan_status");




Route::get('stock_out', [OutController::class, 'index'])->name('stock_out');
Route::get('add-stock_out', [OutController::class, 'create']);
Route::post('add-stock_out', [OutController::class, 'store']);
Route::get('edit-stock_out/{id}', [OutController::class, 'edit']);
Route::put('update-stock_out/{id}', [OutController::class, 'update']);
Route::get('delete-stock_out/{id}', [OutController::class, 'destroy']);
// Route::get('out', [OutController::class, 'invoice'])->name('out');
