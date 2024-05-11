<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderPdfController;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::resource('product', ProductController::class);
Route::resource('appointment', AppointmentController::class);
Route::resource('order', OrderController::class);
Route::resource('client', ClientController::class);

Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
Route::put('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');

Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
Route::put('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');


Route::get('/dashboard', [AppointmentController::class, 'dashboard'])->name('dashboard');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])
    ->name('appointments.show');


    Route::get('orders/{orderId}/download', [OrderPdfController::class, 'downloadOrder'])->name('orders.download');
