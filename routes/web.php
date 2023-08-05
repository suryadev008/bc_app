<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BigCommerceAuthController;

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

Route::get('/oauth', [BigCommerceAuthController::class, 'handleOAuthCallback']);
// routes/api.php
Route::get('/bc/uninstall', [BigCommerceAuthController::class, 'handleUninstallWebhook']);

Route::get('/load', function () {
    return view('view');
});