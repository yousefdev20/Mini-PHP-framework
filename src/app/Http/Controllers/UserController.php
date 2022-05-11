<?php

namespace Yousef\Orm\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Yousef\Orm\app\Http\Requests\StoreUserRequest;
use Yousef\Orm\app\Models\User;

class UserController extends Controller
{
    public function index(StoreUserRequest $request)
    {
//        dd($request->validated());
        return User::query()->get();
        Cache::put('test', ['data' => 'data']);
        Session::put('test', 'test');
        return View::make('welcome');
        return view('welcome');
        return $this->response(['data' => Session::get('test')]);
    }
}