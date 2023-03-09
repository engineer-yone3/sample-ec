<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminControllerBase extends Controller
{
    protected string $htmlTitle;

    protected string $headerTitle;

    public function adminView(string $viewName, ?array $data = null)
    {
        View::share('htmlTitle', $this->htmlTitle);
        View::share('headerTitle', $this->headerTitle);

        if (!empty($data)) {
            return view('admin.' . $viewName, $data);
        }

        return view('admin.' . $viewName);
    }
}
