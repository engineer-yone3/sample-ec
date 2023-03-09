<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;

class AdminUserController extends AdminControllerBase
{
    protected string $htmlTitle = 'Admin画面 アカウント管理';
    protected string $headerTitle = 'アカウント管理';

    public function index()
    {
        $members = AdminUser::all();
        return $this->adminView('adminuser.index', ['data' => ['users' => $members]]);
    }
}
