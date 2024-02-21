<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneratePdfController;
use Laravel\Telescope\Telescope;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and will be assigned to
| the "web" middleware group. Now create something great!
|
*/

// Your existing routes...

// Route for generating PDF
Route::get('/test-pdf', [GeneratePdfController::class, 'testPdf'])->name('test.pdf');
