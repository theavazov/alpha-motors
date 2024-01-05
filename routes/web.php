<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// --- ADMIN ROUTES ---
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect(route('applications.index'));
    })->name('admin');

    // applications
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get(
        '/applications/{id}/edit',
        [ApplicationController::class, 'edit']
    )->name('applications.edit');
    Route::get('/applications/{id}/delete', [ApplicationController::class, 'destroy'])->name('applications.destroy');

    // news
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get(
        '/news/{id}/edit',
        [NewsController::class, 'edit']
    )->name('news.edit');
    Route::get('/news/{id}/delete', [NewsController::class, 'destroy'])->name('news.destroy');

    // faq
    Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
    Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
    Route::put('/faq/{id}/update', [FaqController::class, 'update'])->name('faq.update');
    Route::get('/faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::get(
        '/faq/{id}/edit',
        [FaqController::class, 'edit']
    )->name('faq.edit');
    Route::get('/faq/{id}/delete', [FaqController::class, 'destroy'])->name('faq.destroy');

    // settings -> siteinfo

    // settings -> langs
    Route::get('/langs', [LanguageController::class, 'index'])->name('langs.index');
    Route::post('/langs', [LanguageController::class, 'store'])->name('langs.store');
    Route::put('/langs/{id}/update', [LanguageController::class, 'update'])->name('langs.update');
    Route::get('/langs/create', [LanguageController::class, 'create'])->name('langs.create');
    Route::get('/langs/{id}/edit', [LanguageController::class, 'edit'])->name('langs.edit');
    Route::get('/langs/{id}/delete', [LanguageController::class, 'destroy'])->name('langs.destroy');

    // settings -> translations
});

// --- CLIENT ROUTES ---
Route::get('/', function () {
    return view('client/pages/index', [
        'heading' => 'Alpha Motors',
    ]);
});

Route::get('/vehicles', function () {
    return view('client/pages/vehicles/index', [
        'heading' => 'Alpha Motors | Vehicles',
        'title' => 'Vehicles',
        'parent' => null
    ]);
});

Route::get('/vehicles/{id}', function ($id) {
    return view('client/pages/vehicles/show', [
        'heading' => 'Alpha Motors | Vehicles',
        'title' => $id,
        'parent' => [
            'path' => '/vehicles',
            'title' => 'Vehicles'
        ]
    ]);
});

Route::get('/spare-parts', function () {
    return view('client/pages/spare-parts/index', [
        'heading' => 'Alpha Motors | Spare parts',
        'title' => 'Spare parts',
        'parent' => null
    ]);
});

Route::get('/spare-parts/{id}', function ($id) {
    return view('client/pages/spare-parts/show', [
        'heading' => 'Alpha Motors | Spare parts',
        'title' => $id,
        'parent' => [
            'path' => '/spare-parts',
            'title' => 'Spare parts'
        ]
    ]);
});

Route::get('/about-us', function () {
    return view('client/pages/about', [
        'heading' => 'Alpha Motors | About us',
        'title' => 'About us',
        'parent' => null
    ]);
});

Route::get('/contacts', function () {
    return view('client/pages/contacts', [
        'heading' => 'Alpha Motors | Contacts',
        'title' => 'Contacts',
        'parent' => null
    ]);
});
