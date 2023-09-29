<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
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
        $id = $this->id;

        if (empty($id)) {
            return [
                'email' => ['required', 'email', 'unique'],
                'name' => 'required',
                'password' => ['required', 'between:8,12', 'same:password_confirm'],
                'is_publish' => ['required', 'numeric', Rule::in([1, 2])]
            ];
        }

        return [
            'id' => ['required', 'exists:admin_users,id'],
            'email' => ['required', 'email', Rule::unique('admin_users', 'email')->ignore($id)],
            'name' => 'required',
            'password' => ['sometimes', 'between:8,12', 'same:password_confirm'],
            'is_publish' => ['required', 'numeric', Rule::in([1, 2])]
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes(): array
    {
        return [
            'email' => 'ログインID',
            'name' => '氏名',
            'password' => 'パスワード',
            'is_publish' => '公開状態'
        ];
    }
}
