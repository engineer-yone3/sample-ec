<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends AdminControllerBase
{
    protected string $htmlTitle = 'Admin画面 Home';
    protected string $headerTitle = 'Home画面';

    public function home()
    {
        return $this->adminView('home');
    }
}
