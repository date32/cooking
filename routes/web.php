<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\CookingArchive;
use App\Livewire\CookingEdit;
use App\Livewire\CookingPast;
use App\Livewire\CookingShow;
use App\Livewire\CookingStore;
use App\Livewire\Help;
use App\Livewire\MaterialEdit;
use App\Livewire\MaterialShow;
use App\Livewire\MaterialStore;
use App\Livewire\MemberEdit;
use App\Livewire\MemberShow;
use App\Livewire\MemberStore;
use App\Livewire\MenuEdit;
use App\Livewire\MenuShow;
use App\Livewire\MenuStore;
use App\Livewire\Top;
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

Route::get('/', Top::class)->name('top');

Route::prefix('menu')->group(function() {
    Route::get('/store', MenuStore::class)->name('menuStore');
    Route::get('/show', MenuShow::class)->name('menuShow');
    Route::get('/edit/{id}', MenuEdit::class)->name('menuEdit');
});
Route::prefix('material')->group(function () {
    Route::get('/store', MaterialStore::class)->name('materialStore');
    Route::get('/show', MaterialShow::class)->name('materialShow');
    Route::get('/edit/{id}', MaterialEdit::class)->name('materialEdit');
});
Route::prefix('cooking')->group(function () {
    Route::get('/store', CookingStore::class)->name('cookingStore');
    Route::get('/show', CookingShow::class)->name('cookingShow');
    Route::get('/show/{id}', CookingPast::class)->name('cookingPast');
    Route::get('/edit/{id}', CookingEdit::class)->name('cookingEdit');
});
Route::prefix('member')->group(function () {
    Route::get('/store', MemberStore::class)->name('memberStore');
    Route::get('/show', MemberShow::class)->name('memberShow');
    Route::get('/edit/{id}', MemberEdit::class)->name('memberEdit');
});
Route::get('help', Help::class)->name('help');


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

require __DIR__.'/auth.php';
