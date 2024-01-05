<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public $title = 'Заявки с сайта';

    public function index()
    {
        $array = Application::latest()->paginate(10);

        return view('app.pages.applications.index', [
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
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|max:255',
            'email' => ['required', 'email'],
            'phone_number' => 'required|max:20',
            'service_id' => 'required',
            'message' => 'nullable'
        ]);

        Application::create($data);

        return back()->with([
            'success' => true,
            'message' => 'Успешно добавлен'
        ], 200);
    }

    public function edit($id)
    {
        $object = Application::find($id);

        return view('app.pages.applications.show', [
            'title' => 'Изменить',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('applications.index')
            ],
            'object' => $object
        ]);
    }


    public function update()
    {
    }

    public function destroy($id)
    {
        $object = Application::find($id);

        if (!$object) {
            return back()->with([
                'success' => false,
                'message' => 'Не найден'
            ]);
        }

        $object->delete();

        return back()->with([
            'success' => true,
            'message' => 'Успешно удален'
        ]);
    }
}
