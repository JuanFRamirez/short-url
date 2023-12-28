<?php

use App\Http\Controllers\v1\UrlController;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('url')->group(function () {
    Route::get('/', [UrlController::class, 'index']);
    Route::get('/{urlname}', [UrlController::class, 'show']);
    Route::get('/dec/{urlname}',[UrlController::class, 'url_redirect']);
    Route::post('/', [UrlController::class, 'store'])->name('url.store');
});
