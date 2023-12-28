<?php

use App\Http\Controllers\webUrlController;
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
    return view('index');
})->name('web.index');
Route::get('/srt/{url}', [webUrlController::class, 'show'])->name('web.show');
Route::post('/', [webUrlController::class, 'store'])->name('web.store');
