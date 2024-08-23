<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ForwarderController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function (){

    //route dla admina
   Route::middleware(['can:isAdmin'])->group(function () {
       Route::get('/admin/adminDashboard',[AdminController::class, 'index'])->name('adminDashboard');
       Route::get('/admin/show-user',[AdminController::class, 'show'])->name('showUsers');
       Route::get('/admin/show-user/{id}',[AdminController::class, 'showDetails'])->name('showDetails');
       Route::put('/admin/user-list/{id}', [AdminController::class, 'updateRole'])->name('updateUserRole'); // Dodana ścieżka dla aktualizacji roli użytkownika
       Route::delete('/admin/show-user/{id}', [AdminController::class, 'destroy'])->name('deleteUser');

   });
//tylko dla user
   Route::middleware(['can:isUser'])->group(function (){
       Route::get('/userDashboard',[OrdersController::class, 'index'])->name('userDashboard');
       Route::get('/order/list',[OrdersController::class, 'index'])->name('user.index');
       Route::get('/order/my-order',[OrdersController::class, 'show'])->name('user.show');
       Route::get('/order/add',[OrdersController::class, 'add'])->name('user.add');
       Route::post('/orders', [OrdersController::class, 'store'])->name('orders.store');
   });

    //dla spedytorow
Route::middleware(['can:isForwarder'])->group(function (){

      Route::get('/spedycja/',[ForwarderController::class,'index'])->name('forwarder.index');
      Route::get('/spedycja/active',[ForwarderController::class,'active'])->name('forwarder.active');
      Route::get('/spedycja/history',[ForwarderController::class,'history'])->name('forwarder.history');
      Route::get('/spedycja/przydziel/{id}',[ForwarderController::class, 'assign'])->name('forwarder.assign');
      Route::post('/spedycja/activation/{id}', [ForwarderController::class, 'activation'])->name('forwarder.activation');
      Route::post('/spedycja/activation-driver/{id}/', [ForwarderController::class, 'activeOrdersDriver'])->name('activeOrdersDriver');
      Route::get('/spedycja/allocated',[ForwarderController::class,'allocated'])->name('forwarder.allocated');

});
    //dla kierowcow
    Route::middleware(['can:isDriver'])->group(function () {

        Route::get('/driver', [DriverController::class, 'index'])->name('driver.index');
        Route::get('/driver/history', [DriverController::class, 'history'])->name('driver.history');
        Route::get('/driver/details', [DriverController::class, 'details'])->name('driver.details');
        Route::get('/driver/details/{id}', [DriverController::class, 'details_one'])->name('driver.details_one');
        Route::get('driver/calendar', [DriverController::class ,'calendar'])->name('driver.calendar');
        Route::post('/driver/change-order-status',[DriverController::class,'chanegeStatus'])->name('driver.changeStatus');
    });
});
//dostep dla wszystkich
Route::resource('order',\App\Http\Controllers\OrdersController::class)
    ->only('index')
    ->middleware(['auth', 'verified']);
require __DIR__.'/auth.php';
