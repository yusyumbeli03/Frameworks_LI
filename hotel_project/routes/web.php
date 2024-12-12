<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


Route::get('/', [AdminController::class, 'home']);

Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room']);

Route::get('/view_room', [AdminController::class, 'view_room']);

Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);
Route::get('/room_update/{id}', [AdminController::class, 'room_update']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/book_room/{id}', [HomeController::class, 'book_room']);

Route::middleware('admin')->group(function () {
    Route::get('/bookings', [AdminController::class, 'bookings']);
});

//Route::get('/bookings', [AdminController::class, 'bookings']);
Route::get('/booking_delete/{id}', [AdminController::class, 'booking_delete']);

Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);
Route::get('/rejected_book/{id}', [AdminController::class, 'rejected_book']);


Route::get('/view_gallery', [AdminController::class, 'view_gallery']);
Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);
Route::get('/gallery_delete/{id}', [AdminController::class, 'gallery_delete']);


Route::post('/contact', [HomeController::class, 'contact']);

Route::get('/view_messages', [AdminController::class, 'view_messages']);

Route::get('/about_page', [HomeController::class, 'about_page']);
Route::get('/room_page', [HomeController::class, 'room_page']);
Route::get('/gallery_page', [HomeController::class, 'gallery_page']);
Route::get('/contact_page', [HomeController::class, 'contact_page']);


Route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
Route::any('/mail/{id}', [AdminController::class, 'mail']);
//Route::get('/room',[HomeController::class,'room']);

Route::get('/room_search', [AdminController::class, 'room_search']);


