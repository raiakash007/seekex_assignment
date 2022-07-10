<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;

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


Route::post('/bucketv', [WorkController::class, 'addBucketVolume']);
Route::post('/ballv', [WorkController::class, 'addBallVolume']);
Route::post('/ballc', [WorkController::class, 'addBallCount']);
Route::post('/do', [WorkController::class, 'doWork']);