<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LanguageController extends Controller
{
    public $title = 'Языки';

    public function index()
    {
        $array = Language::latest()->paginate(10);

        return view('app.pages.settings.langs.index', [
            'title' => $this->title,
            'breadcrumb' => null,
            'data' => $array
        ]);
    }

    public function show()
    {
    }

    public function create()
    {
        $data = Language::all();

        return view('app.pages.settings.langs.create', [
            'title' => 'Создать',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('langs.index')
            ],
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $langs = Language::all();

        $data = $request->all();

        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('languages', 'name')],
            'code' => ['nullable', 'min:2', Rule::unique('languages', 'code')],
            'active' => 'required',
        ]);

        $is_active = $data['active'] == '1' ? true : false;
        $is_default = $data['default_lang'] == '1' ? true : false;

        $obj = [
            'name' => $data['name'],
            'code' => $data['code'],
            'is_active' => $is_active,
            'is_default' => count($langs) > 0 ? $is_default : true
        ];

        if ($obj['is_default']) {
            Language::query()->update(['is_default' => false]);
        }

        Language::create($obj);

        return redirect(route('langs.index'))->with([
            'success' => true,
            'message' => 'Успешно добавлен'
        ], 200);
    }

    public function edit($id)
    {
        $data = Language::all();
        $object = Language::find($id);

        return view('app.pages.settings.langs.edit', [
            'title' => 'Изменить',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('langs.index')
            ],
            'data' => $data,
            'object' => $object
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $request->validate([
            'name' => ['required', 'max:255'],
            'code' => ['nullable', 'min:2'],
            'active' => 'required',
        ]);

        $is_active = $data['active'] == '1' ? true : false;
        $is_default = $data['default_lang'] == '1' ? true : false;

        $obj = [
            'name' => $data['name'],
            'code' => $data['code'],
            'is_active' => $is_active,
            'is_default' => $is_default
        ];

        if ($obj['is_default']) {
            Language::query()->update(['is_default' => false]);
        }

        Language::where('id', $id)->update($obj);

        return redirect(route('langs.index'))->with([
            'success' => true,
            'message' => 'Успешно изменен'
        ], 200);
    }

    public function destroy($id)
    {
        $object = Language::find($id);

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
