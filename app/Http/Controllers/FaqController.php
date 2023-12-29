<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public $title = 'FAQ';

    public function index()
    {
        $array = Faq::latest()->paginate(10);

        return view('app.pages.faq.index', [
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
        return view('app.pages.faq.create', [
            'title' => 'Создать',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('faq.index')
            ],
        ]);
    }

    public function store($id)
    {
    }


    public function edit($id)
    {
        $object = Faq::find($id);

        return view('app.pages.faq.edit', [
            'title' => 'Изменить',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('faq.index')
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
