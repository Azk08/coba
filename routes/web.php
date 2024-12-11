<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Certificate;
use App\Http\Controllers\Contact;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Project;
use App\Http\Controllers\Skill;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::resource('/admin/skill', Skill::class);
Route::resource('/admin/certificates', Certificate::class);
Route::resource('/admin/project', Project::class);
Route::resource('/admin/contact', Contact::class);
Route::get('/', [UserController::class, 'index']);

require __DIR__ . '/auth.php';
