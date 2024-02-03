<?php

use Illuminate\Support\Facades\Route;
use App\Services\MailService;

use App\Http\Controllers\Admin\AdminController as Admin;
use Illuminate\Http\Request;

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

Route::prefix('admin')->controller(Admin::class)->group(
    function() {
        Route::get('/', 'index');
    }
);
