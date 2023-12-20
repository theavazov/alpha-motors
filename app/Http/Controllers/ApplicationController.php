<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $object = Application::latest()->paginate(10);

        return view('app/pages/applications', [
            'title' => 'Заявки с сайта',
            'path' => '/applications',
            'breadcrumb' => null,
            'data' => $object
        ]);
    }

    public function show()
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

    public function edit()
    {
    }


    public function update()
    {
    }

    public function destroy($id)
    {
        $object = Application::find($id);

        if (!$object) {
            return back()->with([
                'message' => 'Application not found',
                'success' => false
            ]);
        }

        $object->delete();

        return back()->with([
            'message' => 'Successfully deleted',
            'success' => true
        ]);
    }
}
