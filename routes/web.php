<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  

//All listings

Route::get('/', [ListingController::class, 'index']);

//Show Create Form

Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store listing Data

Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form

Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update listing

Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete listing

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listing

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single listing 

Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show register/create form

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create a new User

Route::post('/users', [UserController::class, 'store']);

//Logout

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log In USer

Route::post('users/authenticate', [UserController::class, 'authenticate']);

