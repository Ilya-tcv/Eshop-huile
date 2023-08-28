<?php

use App\Models\Item;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $items = Item::all();
    return view('welcome', compact("items"));
});

// Backoffice
Route::get('admin', [ItemController::class, 'index'])->name('admin.index');

// Créer item + sauvegarder
Route::get('admin/create', [ItemController::class, 'create'])->name('admin.create');
Route::post('admin/save', [ItemController::class, 'store'])->name('admin.store');

// Edit
Route::get('admin/edit/{id}', [ItemController::class, 'edit'])->name('admin.edit');

// Update
Route::post('admin/update', [ItemController::class, 'update'])->name('admin.update');

// Delete
Route::get('admin/delete/{id}', [ItemController::class, 'destroy'])->name('admin.destroy');
