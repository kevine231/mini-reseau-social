<?php

use App\Http\Controllers\Api\RegisterController;

Route::post('/register', [RegisterController::class, 'store']);
