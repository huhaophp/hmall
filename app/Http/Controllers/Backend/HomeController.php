<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * 后台面板首页视图
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        return view('backend.home');
    }
}

