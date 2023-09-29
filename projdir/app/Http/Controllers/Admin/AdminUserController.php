<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminUserIndexRequest;
use App\Http\Requests\Admin\AdminUserUpdateRequest;
use App\Services\Admin\IAdminUserIndexService;
use Illuminate\Contracts\View\View;

class AdminUserController extends AdminControllerBase
{

    public function __construct(
        private readonly IAdminUserIndexService $adminUserIndexService,
        protected string                        $htmlTitle = 'Admin画面 アカウント管理',
        protected string                        $headerTitle = 'アカウント管理',
    )
    {
    }

    /**
     * @param AdminUserIndexRequest $request
     * @return View
     */
    public function index(AdminUserIndexRequest $request): View
    {
        $condition = $this->createSearchCondition($request);
        $members = $this->adminUserIndexService->search($condition);
        $this->subTitle = 'アカウント一覧';
        return $this->adminView('adminuser.index',
            [
                'data' => [
                    'users' => $members,
                    'search_email' => $condition['search_email'] ?? '',
                    'search_name' => $condition['search_name'] ?? ''
                ],
            ]
        );
    }

    /**
     * @param AdminUserIndexRequest $request
     * @return array
     */
    private function createSearchCondition(AdminUserIndexRequest $request): array
    {
        $condition = [];

        if (!empty($request->search_email)) {
            $condition['search_email'] = $request->search_email;
        }

        if (!empty($request->search_name)) {
            $condition['search_name'] = $request->search_name;
        }

        return $condition;
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $this->subTitle = 'アカウント新規作成';
        return $this->adminView('adminuser.edit');
    }

    public function update(AdminUserUpdateRequest $request): View
    {
        $validated = $request->validated();
    }
}
