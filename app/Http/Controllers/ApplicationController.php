<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public $title = 'Заявки с сайта';

    public function index()
    {
        $applications = Application::latest()->paginate(10);
        $services = Service::all();
        $locale = get_locale()['code'];

        foreach ($applications as $application) {
            $inner_service = Service::find($application['service_id']);
            $inner_service['name'] = db_json_decoder($inner_service['name']);
            $application['service'] = $inner_service;
        }

        foreach ($services as $service) {
            $service['name'] = db_json_decoder($service['name']);
        }

        return view('app.pages.applications.index', [
            'title' => $this->title,
            'breadcrumb' => null,
            'data' => $applications,
            'locale' => $locale,
            'services' => $services
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
        $data = $request->all();

        $request->validate([
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
