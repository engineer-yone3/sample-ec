<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AdminControllerBase
{
    public function adminLogin(LoginRequest $request): Mixed
    {
        $credencials = $request->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credencials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        abort(Response::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request): View
    {
        $request->session()->regenerate();
        $this->adInfo('ログアウトしました');
        return $this->adminView('admin.auth.login');
    }

}
