<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;

class AuthController extends Controller
{
    /**
     * 后台面板登录视图
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(Request $request)
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('backend:home');
        } else {
            return view('backend.auth.login');
        }
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
        $remember = (bool) $request->input('remember');

        $user = User::query()->where('name', $name)->first();
        if (!$user) {
            return back()->withErrors('账号或密码错误');
        }
        if (!Hash::check($password, $user->password)) {
            return back()->withErrors('账号或密码错误');
        }

        Auth::guard('web')->login($user, $remember);

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

        return redirect()->route('backend:auth:show')->with('success', '退出成功');
    }
}

