<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Member;
use App\Models\MemberCategory;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/signup', function () { //route pro Signup Page !!!!!!
    return Inertia::render('Signup');
})->name('signup');

//Route::apiResource('members', MemberController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', function () { //route pro Admin Panel !!!!!!
        $member_categories = MemberCategory::with('members')->get(); // Načte kategorie a jejich členy

        $members = Member::all(); 
        return Inertia::render('Dashboard', ['members' => $members, 'member_categories' => $member_categories]);
    })->name('dashboard');

    Route::get('/create-members', function () { //route pro Create Members Page !!!!!!
        Member::create10members();
    })->name('create-members');


});

require __DIR__.'/auth.php';
