<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\View\View;

class AuthController extends AdminControllerBase
{
    public function adminLogin(LoginRequest $request): View
    {
        return view('admin.auth.login');
    }

    public function home()
    {
        return view('admin.auth.hoge');
    }
}
