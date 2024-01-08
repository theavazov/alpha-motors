<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

// --- ADMIN ROUTES ---
Route::group(['prefix' => 'admin'], function () {
    // index
    // Route::get('/{any}', function ($any) {
    //     if (auth()->user() == null) {
    //         return redirect(route('login'));
    //     }
    // })->where('any', '.*');

    // index
    Route::get('/', function () {
        return redirect(route('applications.index'));
    })->name('admin');

    // login - logout
    Route::get('/login', [UserController::class, 'index'])->name('login');

    Route::post('/login', [UserController::class, 'store'])->name('login.store');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // applications
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    // Route::get(
    //     '/applications/{id}/edit',
    //     [ApplicationController::class, 'edit']
    // )->name('applications.edit');
    Route::get('/applications/{id}/delete', [ApplicationController::class, 'destroy'])->name('applications.destroy');

    // // news
    // Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    // Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    // Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    // Route::get(
    //     '/news/{id}/edit',
    //     [NewsController::class, 'edit']
    // )->name('news.edit');
    // Route::get('/news/{id}/delete', [NewsController::class, 'destroy'])->name('news.destroy');

    // services
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{id}/update', [
        ServiceController::class, 'update'
    ])->name('services.update');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::get(
        '/services/{id}/edit',
        [ServiceController::class, 'edit']
    )->name('services.edit');
    Route::get('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('services.destroy');

    // products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}/update', [
        ProductController::class, 'update'
    ])->name('products.update');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get(
        '/products/{id}/edit',
        [ProductController::class, 'edit']
    )->name('products.edit');
    Route::get('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

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
    $array = Service::all();
    $locale = get_locale()['code'];
    $services = array();

    foreach ($array as $obj) {
        $new_obj = array();
        $new_obj['id'] = $obj['id'];
        $new_obj['slug'] = $obj['slug'];
        $new_obj['name'] = db_json_decoder($obj['name']);

        array_push($services, $new_obj);
    }

    return view('client/pages/index', compact('services', 'locale'));
})->name('home');

Route::get('/about-us', function () {
    $locale = get_locale()['code'];
    $array = Service::all();
    $dbfaqs = Faq::all();
    $faqs = array();
    $services = array();

    foreach ($array as $obj) {
        $new_obj = array();
        $new_obj['id'] = $obj['id'];
        $new_obj['slug'] = $obj['slug'];
        $new_obj['name'] = db_json_decoder($obj['name']);

        array_push($services, $new_obj);
    }

    foreach ($dbfaqs as $faq) {
        $new_obj = array();
        $new_obj['id'] = $faq['id'];
        $new_obj['question'] = json_decode($faq['question'], true);
        $new_obj['answer'] = json_decode($faq['answer'], true);
        $new_obj['is_active'] = $faq['is_active'];

        array_push($faqs, $new_obj);
    }

    return view('client/pages/about', compact('services', 'locale', 'faqs'));
})->name('about');

Route::get('/contacts', function () {
    $locale = get_locale()['code'];
    $array = Service::all();
    $services = array();

    foreach ($array as $obj) {
        $new_obj = array();
        $new_obj['id'] = $obj['id'];
        $new_obj['slug'] = $obj['slug'];
        $new_obj['name'] = db_json_decoder($obj['name']);

        array_push($services, $new_obj);
    }

    return view('client/pages/contacts', compact('services', 'locale'));
})->name('contacts');

Route::get('/{service_slug}', function ($service_slug) {
    $locale = get_locale()['code'];
    $service = Service::where('slug', $service_slug)->first();
    $array = Service::all();
    $services = array();

    foreach ($array as $obj) {
        $new_obj = array();
        $new_obj['id'] = $obj['id'];
        $new_obj['slug'] = $obj['slug'];
        $new_obj['name'] = db_json_decoder($obj['name']);

        array_push($services, $new_obj);
    }

    $service['name'] = db_json_decoder($service['name']);

    return view('client/pages/services/index', compact('services', 'service', 'locale'));
})->name('service.index');

Route::get('/products/{id}', function ($id) {
    $locale = get_locale()['code'];
    $array = Service::all();
    $services = array();

    foreach ($array as $obj) {
        $new_obj = array();
        $new_obj['id'] = $obj['id'];
        $new_obj['slug'] = $obj['slug'];
        $new_obj['name'] = db_json_decoder($obj['name']);

        array_push($services, $new_obj);
    }

    return view('client/pages/products/show', compact('services', 'locale'));
});
