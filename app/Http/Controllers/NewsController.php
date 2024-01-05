<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\News;

class NewsController extends Controller
{
    public $title = 'Новости';

    public function index()
    {
        $array = News::latest()->paginate(10);

        return view('app.pages.news.index', [
            'title' => $this->title,
            'breadcrumb' => null,
            'data' => $array
        ]);
    }

    public function show($id)
    {
    }


    public function create()
    {
        return view('app.pages.news.create', [
            'title' => 'Создать',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('news.index')
            ],
        ]);
    }

    public function store($id)
    {
    }


    public function edit($id)
    {
        $object = News::find($id);

        return view('app.pages.news.edit', [
            'title' => 'Изменить',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('news.index')
            ],
            'object' => $object
        ]);
    }

    public function update()
    {
    }

    public function destroy($id)
    {
    }
}
