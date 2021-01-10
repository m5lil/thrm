<?php

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
//    auth()->loginUsingId(1);
//    Gate::authorize('view-leaves');

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/settings', [\App\Modules\Core\Controllers\SettingController::class, 'index'])->name('setting.index');
Route::post('/settings/update', [\App\Modules\Core\Controllers\SettingController::class, 'update'])->name('settings.update');
