<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;

// Shows the sample Eloquent code
Route::get('/', [LeaveController::class, 'index']);

// The validation request class
Route::get('/', [LeaveController::class, 'store']);

// The sample ORM built in the video
Route::get('callingMethodExample', [LeaveController::class, 'callingMethodExample']);