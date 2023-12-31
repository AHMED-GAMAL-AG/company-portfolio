<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubscriberController;
use App\Models\Project;
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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('projects.index', ['projects' => Project::paginate(6)]);
    })->name('home');
});

Route::resource('/projects', ProjectController::class);

Route::get('lang/{locale}', [LanguageController::class, 'changeLocale'])->name('lang.switch');

Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

Route::get('/emails', [EmailController::class, 'show'])->name('email.show');
Route::post('/send', [EmailController::class, 'sendEmail'])->name('email.send');

Route::get('/admin/users', [AdminController::class , 'index'])->name('users.all');
Route::patch('/admin/users/{user}', [AdminController::class, 'update'])->name('users.update');
