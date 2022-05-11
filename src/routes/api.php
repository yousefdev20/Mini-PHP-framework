<?php
use Illuminate\Support\Facades\Route;

Route::get('/', [\Yousef\Orm\app\Http\Controllers\UserController::class, 'index']);