<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Language;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public $title = 'FAQ';

    public function index()
    {
        $locale = get_locale();
        $array = Faq::latest()->paginate(10);
        $data = array();

        foreach ($array as $object) {
            $new_obj = array();
            $new_obj['id'] = $object['id'];
            $new_obj['question'] = json_decode($object['question'], true);
            $new_obj['answer'] = json_decode($object['answer'], true);
            $new_obj['is_active'] = $object['is_active'];
            $new_obj['created_at'] = $object['created_at'];
            $new_obj['updated_at'] = $object['updated_at'];

            array_push($data, $new_obj);
        }

        return view('app.pages.faq.index', [
            'title' => $this->title,
            'breadcrumb' => null,
            'data' => $data,
            'locale' => $locale
        ]);
    }

    public function show($id)
    {
    }


    public function create()
    {
        $locale = get_locale();
        $langs = Language::all();

        return view('app.pages.faq.create', [
            'title' => 'Создать',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('faq.index')
            ],
            'langs' => $langs,
            'locale' => $locale
        ]);
    }

    public function store(Request $request)
    {
        $locale = get_locale()['code'];
        $data = $request->all();

        $question = filter_formdata_by_key($data, 'question');
        $answer = filter_formdata_by_key($data, 'answer');

        $request->validate([
            "question_$locale" => ['required', 'max:255'],
            "answer_$locale" => ['required', 'max:255'],
        ]);

        Faq::create([
            'question' => json_encode($question),
            'answer' => json_encode($answer),
        ]);

        return redirect(route('faq.index'))->with([
            'success' => true,
            'message' => 'Успешно добавлен'
        ], 200);
    }


    public function edit($id)
    {
        $locale = get_locale();
        $langs = Language::all();
        $object = Faq::find($id);

        $object['question'] = db_json_decoder($object['question']);
        $object['answer'] = db_json_decoder($object['answer']);

        return view('app.pages.faq.edit', [
            'title' => 'Изменить',
            'breadcrumb' => [
                'title' => $this->title,
                'path' => route('faq.index')
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

        $question = filter_formdata_by_key($data, 'question');
        $answer = filter_formdata_by_key($data, 'answer');

        $request->validate([
            "question_$locale" => ['required', 'max:255'],
            "answer_$locale" => ['required', 'max:255'],
        ]);

        $obj = [
            'question' => json_encode($question),
            'answer' => json_encode($answer),
        ];

        Faq::where('id', $id)->update($obj);

        return redirect(route('faq.index'))->with([
            'success' => true,
            'message' => 'Успешно изменен'
        ], 200);
    }

    public function destroy($id)
    {
        $object = Faq::find($id);

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
