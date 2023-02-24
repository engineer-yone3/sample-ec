<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminControllerBase extends Controller
{
    protected string $htmlTitle;

    protected string $headerTitle;

    public function adminView(string $viewName)
    {
        View::share('htmlTitle', $this->htmlTitle);
        View::share('headerTitle', $this->headerTitle);

        return view('admin.' . $viewName);
    }
}
