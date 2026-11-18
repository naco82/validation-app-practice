<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //ユーザー登録画面を表示する
    public function create()
    {
        return view('register');
    }

    //ユーザーをデータベースに保存する
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        //データベースにユーザーを新規作成する
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        //登録完了画面を表示する
        return view('register_success');

    }
}
