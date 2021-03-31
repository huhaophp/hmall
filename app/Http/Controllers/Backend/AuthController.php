<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * 后台面板登录视图
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('backend.auth.login');
    }

    /**
     * 后台面板登录提交
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $name     = $request->input('name');
        $password = $request->input('password');

        $user = User::query()->where('name', $name)->first();
        if (!$user) {
            return back()->withErrors('账号或密码错误');
        }
        if (!Hash::check($password, $user->password)) {
            return back()->withErrors('账号或密码错误');
        }

        Auth::guard('web')->login($user);

        return redirect()->route('backend:home')->with('success', '登录成功');
    }

    /**
     * 后台面板登录退出
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Auth::guard('web')->logout();

        return redirect()->route('backend:auth:show')->withErrors("登录失效");
    }
}

