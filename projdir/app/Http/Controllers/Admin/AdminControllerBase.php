<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class AdminControllerBase extends Controller
{
    /** ページタイトル(headタグのtitle) */
    protected string $htmlTitle;
    /** ページヘッダタイトル(body部に表示するtitle) */
    protected string $headerTitle;
    /** ページヘッダサブタイトル(補足的なタイトル) */
    protected string $subTitle = '';

    public function adminView(string $viewName, ?array $data = null)
    {
        View::share('htmlTitle', $this->htmlTitle);
        View::share('headerTitle', $this->headerTitle);
        View::share('subTitle', $this->subTitle);

        if (!empty($data)) {
            return view('admin.' . $viewName, $data);
        }

        return view('admin.' . $viewName);
    }
}
