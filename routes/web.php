<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CalendarController;
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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(EventController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/events', 'index')->name('index');
    Route::post('/events', 'store')->name('store');
    Route::get('/events/create','create')->name('create');
    Route::post('/events/create', 'templateUpdate')->name('templateUpdate');
    Route::get('/events/{event}', 'show')->name('show');
    Route::put('/events/{event}', 'update')->name('update');
    Route::delete('/events/{event}','delete')->name('delete');
    Route::get('/events/{event}/edit','edit')->name('edit');
    Route::get('/events/{event}/share','share')->name('share');
    Route::post('/events/{event}/share','shareEvent')->name('shareEvent');
});
Route::controller(UserController::class)->middleware(['auth'])->group(function(){
    Route::get('/users','index')->name('user');
    Route::get('/users/shareEvents','showShareEvents')->name('showShareEvents');
    Route::get('/users/sharedEvents','showSharedEvents')->name('showSharedEvents');
    Route::get('/users/shareEvents/{id}','showShareEvent')->name('showShareEvent');
    Route::get('/users/sharedEvents/{id}','showSharedEvent')->name('showSharedEvent');
    Route::get('/users/request','displayRequest')->name('displayRequest');
    Route::get('/users/followers', 'followers')->name('followers');
    Route::get('/users/followees', 'followees')->name('followees');
    Route::get('/users/followers/{id}','followerShow')->name('followerShow');
    Route::get('/users/followees/{id}','followeeShow')->name('followeeShow');
    Route::get('/send-friend-request', 'request')->name('request'); 
    Route::post('/send-friend-request', 'request')->name('request'); 
});
Route::controller(SettingController::class)->middleware(['auth'])->group(function(){
    Route::get('/settings', 'index')->name('setting');
});
Route::controller(CalendarController::class)->middleware(['auth'])->group(function(){
    Route::get('/dashboard/month', 'show')->name('show');
    Route::get('/dashboard/today', 'showTodayEvents')->name('showTodayEvents');
});

Route::get('/get-user-info/{username}', 'FriendController@getUserInfo');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';