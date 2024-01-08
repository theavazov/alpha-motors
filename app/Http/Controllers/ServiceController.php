<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public $title = 'Услуги';

    public function index()
    {
        $array = Service::latest()->paginate(10);
        $locale = get_locale();

        $data = array();

        foreach ($array as $object) {
            $new_obj = array();
            $new_obj['id'] = $object['id'];
            $new_obj['slug'] = $object['slug'];
            $new_obj['name'] = db_json_decoder($object['name']);
            $new_obj['icon'] = $object['icon'];
            $new_obj['is_active'] = $object['is_active'];
            $new_obj['created_at'] = $object['created_at'];
            $new_obj['updated_at'] = $object['updated_at'];

            array_push($data, $new_obj);
        }

        return view('app.pages.services.index', [
            'title' => $this->title,
            'breadcrumb' => null,
            'data' => $data,
            'locale' => $locale
        ]);
    }

    public function create()
    {
        $data = Service::latest()->paginate(10);
        $langs = Language::all();
        $locale = get_locale();

        return view('app.pages.services.create', [
            'title' => 'Создать',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('services.index')
            ],
            'data' => $data,
            'langs' => $langs,
            'locale' => $locale
        ]);
    }

    public function store(Request $request)
    {
        $locale = get_locale()['code'];
        $data = $request->all();

        $name = filter_formdata_by_key($data, 'name');

        $request->validate([
            "name_$locale" => ['required', 'max:255', 'min:2'],
            'icon' => 'required'
        ]);

        $obj = [
            'name' => json_encode($name),
            'icon' => $data['icon'],
            'slug' => Str::slug($data["name_$locale"]),
        ];

        Service::create($obj);

        return redirect(route('services.index'))->with([
            'success' => true,
            'message' => 'Успешно добавлен'
        ], 200);
    }

    public function edit($id)
    {
        $object = Service::find($id);
        $langs = Language::all();
        $locale = get_locale();

        $object['name'] = db_json_decoder($object['name']);

        return view('app.pages.services.edit', [
            'title' => 'Изменить',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('services.index')
            ],
            'object' => $object,
            'langs' => $langs,
            'locale' => $locale
        ]);
    }

    public function update(Request $request, $id)
    {
        $locale = get_locale()['code'];
        $data = $request->all();

        $name = filter_formdata_by_key($data, 'name');

        $request->validate([
            "name_$locale" => ['required', 'max:255', 'min:2'],
            'icon' => 'required'
        ]);

        $obj = [
            'name' => json_encode($name),
            'icon' => $data['icon'],
            'slug' => Str::slug($data["name_$locale"]),
        ];

        Service::where('id', $id)->update($obj);

        return redirect(route('services.index'))->with([
            'success' => true,
            'message' => 'Успешно изменен'
        ], 200);
    }

    public function destroy($id)
    {
        $object = Service::find($id);

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
