<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::apiResource('/post', PostsController::class);
