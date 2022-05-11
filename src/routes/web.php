<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   dd(['data' => 'test']);
});