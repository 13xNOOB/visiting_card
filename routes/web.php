<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputVisitingCardDataController;
use App\Http\Controllers\ShowVisitingCardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SearchCardController;
use App\Http\Controllers\SearchResultController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //added for website functionality
    // Display form route (GET request)
    Route::get('/submitdataform', [InputVisitingCardDataController::class,'index'])->name('submitdataform');

    // Submit form data route (POST request)
    Route::post('/submitdata', [InputVisitingCardDataController::class,'validatedata'])->name('validatedata');

    // View form data after submitting informtaion (GET request)
    Route::get('/visitingcard_view', [ShowVisitingCardController::class,'index'])->name('index');

    // For PDF
    Route::get('/viewpdf/{id}', [PDFController::class, 'viewPdf'])->name('viewpdf');//View PDF
    Route::get('/downloadpdf/{id}', [PDFController::class, 'downloadPdf'])->name('downloadpdf');//Download PDF

    //Search for card
    // View form data after submitting informtaion (GET request)
    Route::get('/search_view', [SearchCardController::class,'index'])->name('index');
    //View suggestions
    Route::get('/search', [SearchCardController::class, 'search'])->name('search-cards');
    //Return search result
    Route::get('/searchresult/{id}', [SearchResultController::class, 'index'])->name('index');

});

require __DIR__.'/auth.php';
