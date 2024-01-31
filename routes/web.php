<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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
// all listing


/*Route::get('/', function () {
  return view('listings', [
    
    'listings' => Listing::all()
  ]);
});*/

Route::get('/', [ListingController::class, 'index']);


//Create job form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//store job form
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Edit Submit to Update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Registor /Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User Storage
Route::post('/users', [UserController::class, 'store']);

// Log USer Out
Route::post('logout', [UserController::class, 'logout'])->middleware('auth');

// show login Form
Route::get('login',[UserController::class,'login'])->name('login')->middleware('guest');

//log In user
Route::post('/users/authenticate',[UserController::class,'authenticate']);





// Single listing




/*Route::get(
  '/listings/{id}',
  function ($id) {
    $listing = Listing::find($id);
    if ($listing) {
      return view('listing', ['listing' => Listing::find($id)]);
    }else{
      abort('404');
    }
  }
); is equal to the underline*/

/*Route::get(
  '/listings/{listing}',
  function (Listing $listing) {


    return view('listing', ['listing' => $listing]);
  }
);*/

Route::get('/listings/{listing}', [ListingController::class, 'show']);
