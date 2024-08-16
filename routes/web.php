<?php

use App\Http\Controllers\AdminReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\SheetReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);

Route::get('/getPractice', [PracticeController::class, 'getPractice']);

Route::group(['prefix' => 'movies'], function () {
    Route::get('/', [MovieController::class, 'list'])->name('movie.list');
    Route::get('/{id}', [MovieController::class, 'index'])->name('movie.index');
    Route::get('/{movie_id}/schedules/{schedule_id}/sheets', [MovieController::class, 'sheets'])->name('movie.sheets');
    Route::get('/{movie_id}/schedules/{schedule_id}/reservations/create', [MovieController::class, 'reserveSheet'])->name('movie.sheets.reservations');
});

Route::post('/reservations/store', [SheetReservationController::class, 'store'])->name('sheets.reservation.store');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/movies', [MovieController::class, 'admin']);
    Route::get('/movies/create', [MovieController::class, 'create']);
    Route::post('/movies/store', [MovieController::class, 'store']);
    Route::get('/movies/{id}/edit/', [MovieController::class, 'edit']);
    Route::patch('/movies/{id}/update/', [MovieController::class, 'update']);
    Route::delete('/movies/{id}/destroy/', [MovieController::class, 'destroy']);

    Route::get('/movies/{id}', [MovieController::class, 'index']);

    Route::get('/movies/{id}/schedules/create/', [ScheduleController::class, 'create']);
    Route::post('/movies/{id}/schedules/store/', [ScheduleController::class, 'store']);

    Route::get('/schedules', [ScheduleController::class, 'schedules']);
    Route::get('/schedules/{id}', [ScheduleController::class, 'index']);
    Route::get('/schedules/{id}/edit/', [ScheduleController::class, 'edit']);
    Route::post('/schedules/{id}/update/', [ScheduleController::class, 'update']);
    Route::delete('/schedules/{id}/destroy/', [ScheduleController::class, 'destroy']);

    Route::group(['prefix' => 'reservations'], function () {
        Route::get('/', [AdminReservationController::class, 'list'])->name('admin.reservations');
        Route::get('/create', [AdminReservationController::class, 'create']);
        Route::post('/', [AdminReservationController::class, 'store']);
        Route::get('/{id}/edit', [AdminReservationController::class, 'edit']);
        Route::post('/{id}', [AdminReservationController::class, 'update']);
        Route::delete('/{id}', [AdminReservationController::class, 'delete']);
    });
});

Route::group(['prefix' => 'sheets'], function () {
    Route::get('/', [SheetController::class, 'index']);
});
