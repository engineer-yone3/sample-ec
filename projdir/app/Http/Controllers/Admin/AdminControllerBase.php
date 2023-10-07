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
    /** INFOメッセージ配列 */
    private array $infoMessages = [];
    /** ERRORメッセージ配列 */
    private array $errorMessages = [];

    /**
     * @param string $viewName
     * @param array|null $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    protected function addInfo($message): void
    {
        $this->infoMessages[] = $message;
        View::share('infoMessages', $this->infoMessages);
    }

    protected function addError($message): void
    {
        $this->errorMessages[] = $message;
        View::share('errorMessages', $this->errorMessages);
    }
}
