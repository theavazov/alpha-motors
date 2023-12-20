<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

// --- ADMIN ROUTES ---
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return redirect(route('applications.index'));
    })->name('admin');

    // applications
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{id}/delete', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

// --- CLIENT ROUTES ---
Route::get('/', function () {
    return view('client/pages/index');
});

Route::get('/vehicles', function () {
    return view('client/pages/vehicles/index', [
        'title' => 'Vehicles',
        'parent' => null
    ]);
});

Route::get('/vehicles/{id}', function () {
    return view('client/pages/vehicles/show', [
        'title' => '{id}',
        'parent' => [
            'path' => '/vehicles',
            'title' => 'Vehicles'
        ]
    ]);
});

Route::get('/spare-parts', function () {
    return view('client/pages/spare-parts/index', [
        'title' => 'Spare parts',
        'parent' => null
    ]);
});

Route::get('/spare-parts/{id}', function () {
    return view('client/pages/spare-parts/show', [
        'title' => '{id}',
        'parent' => [
            'path' => '/spare-parts',
            'title' => 'Spare parts'
        ]
    ]);
});

Route::get('/about-us', function () {
    return view('client/pages/about', [
        'title' => 'About us',
        'parent' => null
    ]);
});

Route::get('/contacts', function () {
    return view('client/pages/contacts', [
        'title' => 'Contacts',
        'parent' => null
    ]);
});
