<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContentSubmissionController;
use App\Http\Controllers\DashboardAnimalController;
use App\Http\Controllers\DashboardClassifiedController;
use App\Http\Controllers\DashboardContentSubmissionController;
use App\Http\Controllers\DashboardInquiryController;
use App\Http\Controllers\DashboardMediaModerationController;
use App\Http\Controllers\DashboardSpeciesController;
use App\Http\Controllers\DashboardSubspeciesController;
use App\Http\Controllers\ClassifiedController;
use App\Http\Controllers\ClassifiedInquiryController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerProfileController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\SubspeciesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Species
Route::get('/species', [SpeciesController::class, 'index'])->name('species.index');
Route::get('/species/search', [SpeciesController::class, 'search'])->name('species.search')
    ->middleware('cache.headers:public;max_age=300;s_maxage=300;etag');
Route::get('/species/{species}', [SpeciesController::class, 'show'])->name('species.show');
Route::post('/species/{species}/media', [SpeciesController::class, 'storeMedia'])->name('species.media.store')->middleware('auth');
Route::post('/species/{species}/submissions', [ContentSubmissionController::class, 'storeForSpecies'])->name('species.submissions.store')->middleware('auth');

// Subspecies
Route::get('/subspecies/{subspecies}', [SubspeciesController::class, 'show'])->name('subspecies.show');
Route::post('/subspecies/{subspecies}/media', [SubspeciesController::class, 'storeMedia'])->name('subspecies.media.store')->middleware('auth');
Route::post('/subspecies/{subspecies}/submissions', [ContentSubmissionController::class, 'storeForSubspecies'])->name('subspecies.submissions.store')->middleware('auth');

// Media attribution
Route::get('/media/{media}/attribution', [MediaController::class, 'attribution'])->name('media.attribution');

// Animals
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
Route::get('/animals/{animal:slug}', [AnimalController::class, 'show'])->name('animals.show');
Route::get('/animals/{animal:slug}/inquire', [InquiryController::class, 'create'])->name('animals.inquiries.create');
Route::post('/animals/{animal:slug}/inquire', [InquiryController::class, 'store'])->name('animals.inquiries.store');

// Classifieds
Route::get('/classifieds', [ClassifiedController::class, 'index'])->name('classifieds.index');
Route::get('/classifieds/{classified:slug}', [ClassifiedController::class, 'show'])->name('classifieds.show');
Route::get('/classifieds/{classified:slug}/inquire', [ClassifiedInquiryController::class, 'create'])->name('classifieds.inquiries.create');
Route::post('/classifieds/{classified:slug}/inquire', [ClassifiedInquiryController::class, 'store'])->name('classifieds.inquiries.store');

// Sellers
Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
Route::get('/sellers/{seller:slug}', [SellerController::class, 'show'])->name('sellers.show');

// Auth-required
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'uploadPhoto'])->name('profile.photo.update');
    Route::delete('/profile/photo', [ProfileController::class, 'destroyPhoto'])->name('profile.photo.destroy');
    Route::patch('/profile/seller', [SellerProfileController::class, 'save'])->name('profile.seller.save');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('dashboard.')->group(function () {
        Route::resource('dashboard/classifieds', DashboardClassifiedController::class)->middleware('verified');
        Route::resource('dashboard/animals', DashboardAnimalController::class)->middleware('verified');
        Route::delete('dashboard/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy')->middleware('verified');

        // Inquiries
        Route::get('dashboard/inquiries', [DashboardInquiryController::class, 'index'])->name('inquiries.index');
        Route::get('dashboard/inquiries/{inquiry}', [DashboardInquiryController::class, 'show'])->name('inquiries.show');
        Route::post('dashboard/inquiries/{inquiry}/reply', [DashboardInquiryController::class, 'reply'])->name('inquiries.reply');
        Route::patch('dashboard/inquiries/{inquiry}/close', [DashboardInquiryController::class, 'close'])->name('inquiries.close');
        Route::delete('dashboard/inquiries/{inquiry}', [DashboardInquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Media moderation
        Route::get('dashboard/media', [DashboardMediaModerationController::class, 'index'])->name('media.index');
        Route::patch('dashboard/media/{media}/approve', [DashboardMediaModerationController::class, 'approve'])->name('media.approve');
        Route::patch('dashboard/media/{media}/reject', [DashboardMediaModerationController::class, 'reject'])->name('media.reject');

        // Species admin
        Route::get('dashboard/species/{species}/edit', [DashboardSpeciesController::class, 'edit'])->name('species.edit');
        Route::patch('dashboard/species/{species}', [DashboardSpeciesController::class, 'update'])->name('species.update');
        Route::delete('dashboard/species/{species}/media/{media}', [DashboardSpeciesController::class, 'detachMedia'])->name('species.media.detach');
        Route::get('dashboard/species/media', [\App\Http\Controllers\DashboardSpeciesMediaController::class, 'index'])->name('species.media.index');
        Route::patch('dashboard/species/media/{media}/approve', [\App\Http\Controllers\DashboardSpeciesMediaController::class, 'approve'])->name('species.media.approve');
        Route::patch('dashboard/species/media/{media}/reject', [\App\Http\Controllers\DashboardSpeciesMediaController::class, 'reject'])->name('species.media.reject');

        // Subspecies admin
        Route::get('dashboard/subspecies/{subspecies}/edit', [DashboardSubspeciesController::class, 'edit'])->name('subspecies.edit');
        Route::patch('dashboard/subspecies/{subspecies}', [DashboardSubspeciesController::class, 'update'])->name('subspecies.update');
        Route::delete('dashboard/subspecies/{subspecies}/media/{media}', [DashboardSubspeciesController::class, 'detachMedia'])->name('subspecies.media.detach');
        Route::get('dashboard/subspecies/media', [\App\Http\Controllers\DashboardSubspeciesMediaController::class, 'index'])->name('subspecies.media.index');
        Route::patch('dashboard/subspecies/media/{media}/approve', [\App\Http\Controllers\DashboardSubspeciesMediaController::class, 'approve'])->name('subspecies.media.approve');
        Route::patch('dashboard/subspecies/media/{media}/reject', [\App\Http\Controllers\DashboardSubspeciesMediaController::class, 'reject'])->name('subspecies.media.reject');

        // Content submissions
        Route::get('dashboard/submissions', [DashboardContentSubmissionController::class, 'index'])->name('submissions.index');
        Route::patch('dashboard/submissions/{submission}/approve', [DashboardContentSubmissionController::class, 'approve'])->name('submissions.approve');
        Route::patch('dashboard/submissions/{submission}/reject', [DashboardContentSubmissionController::class, 'reject'])->name('submissions.reject');
    });
});

// Legal
Route::get('/privacy', fn () => view('legal.privacy'))->name('legal.privacy');
Route::get('/terms', fn () => view('legal.terms'))->name('legal.terms');

require __DIR__.'/auth.php';
