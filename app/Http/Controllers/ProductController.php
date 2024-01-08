<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Service;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $title = 'Продукты';

    public function index()
    {
        return view('app.pages.products.index', [
            'title' => $this->title,
            'breadcrumb' => null,
            'data' => []
        ]);
    }

    public function create()
    {
        $locale = get_locale()['code'];
        $langs = Language::all();
        $array = Service::all();

        $services = array();

        foreach ($array as $obj) {
            $new_obj = array();
            $new_obj['id'] = $obj['id'];
            $new_obj['slug'] = $obj['slug'];
            $new_obj['name'] = db_json_decoder($obj['name']);

            array_push($services, $new_obj);
        }

        return view('app.pages.products.create', [
            'title' => 'Создать',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('products.index')
            ],
            'langs' => $langs,
            'locale' => $locale,
            'services' => $services
        ]);
    }
}
