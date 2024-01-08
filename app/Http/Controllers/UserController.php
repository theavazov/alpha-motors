<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = env('PROJECT_NAME', 'Dashboard');

        return view('app.pages.login', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // $request->validate([
        //     'name' => 'required|min:2|max:255',
        //     'password' => 'password|min:6|max:6'
        // ]);

        // $data['password'] = bcrypt($data['password']);

        if ($data['name'] == 'admin' && $data['password'] == '123123') {
            $user = User::create($data);

            auth()->login($user);

            return redirect(route('applications.index'))->with([
                'success' => true,
                'messsage' => 'Успешно вошли в систему'
            ]);
        } else {
            return back()->with([
                'success' => false,
                'message' => 'Неверный логин или пароль'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('admin'));
    }
}
