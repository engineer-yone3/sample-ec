<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->user_id;

        if (empty($id)) {
            return [
                'email' => ['required', 'email', 'unique:admin_users'],
                'name' => 'required',
                'password' => ['required', 'between:8,12', 'same:password_confirm'],
                'is_publish' => ['required', 'numeric', Rule::in([0, 1])]
            ];
        }

        return [
            'user_id' => ['required', 'exists:admin_users,id'],
            'email' => ['required', 'email', Rule::unique('admin_users', 'email')->ignore($id)],
            'name' => 'required',
            'password' => ['nullable', 'between:8,12', 'same:password_confirm'],
            'is_publish' => ['required', 'numeric', Rule::in([0, 1])]
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes(): array
    {
        return [
            'user_id' => 'ユーザーID',
            'email' => 'ログインID',
            'name' => '氏名',
            'password' => 'パスワード',
            'password_confirm' => 'パスワード(確認入力)',
            'is_publish' => '公開状態'
        ];
    }
}
