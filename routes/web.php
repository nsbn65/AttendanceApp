<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\RecordController;



Route::get('/',[AttendanceController::class,'index'])->middleware('auth');
Route::post('/punch/in',[AttendanceController::class,'punchIn'])->name('punch/in')->middleware('auth');
Route::post('/punch/out',[AttendanceController::class,'punchOut'])->name('punch/out')->middleware('auth');
Route::post('/rest/in',[RestController::class,'restIn'])->name('rest/in')->middleware('auth');
Route::post('/rest/out',[RestController::class,'restOut'])->name('rest/out')->middleware('auth');
Route::get('/record',[RecordController::class,'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
