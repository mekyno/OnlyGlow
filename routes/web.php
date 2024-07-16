<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Member;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
//ss

Route::get('/signup', function () { //route pro Signup Page !!!!!!
    return Inertia::render('Signup');
})->name('signup');

//Route::apiResource('members', MemberController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', function () { //route pro Admin Panel !!!!!!
        $members = Member::all(); 
        return Inertia::render('Dashboard', ['members' => $members]);
    })->name('dashboard');

    Route::get('/create-members', function () { //route pro Create Members Page !!!!!!
        Member::create10members();
    })->name('create-members');


});

require __DIR__.'/auth.php';
