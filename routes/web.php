<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\RecordController;



Route::get('/',[AttendanceController::class,'index']);
Route::post('/punch/in',[AttendanceController::class,'punchIn'])->name('punch/in');
Route::post('/punch/out',[AttendanceController::class,'punchOut'])->name('punch/out');
Route::post('/rest/in',[RestController::class,'restIn'])->name('rest/in');
Route::post('/rest/out',[RestController::class,'restOut'])->name('rest/out');
Route::get('/record',[RecordController::class,'index']);


