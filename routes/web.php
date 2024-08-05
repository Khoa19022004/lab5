<?php

use App\Http\Controllers\TinController;
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

Route::resource('posts', TinController::class)->names([
    'index'   => 'posts.index',
    'create'  => 'posts.create',
    'store'   => 'posts.store',
    'show'    => 'posts.show',
    'edit'    => 'posts.edit',
    'update'  => 'posts.update',
    'destroy' => 'posts.destroy',
]);