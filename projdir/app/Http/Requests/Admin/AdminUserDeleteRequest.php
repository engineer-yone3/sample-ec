<?php

namespace App\Http\Requests\Admin;

use App\Models\AdminUser;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserDeleteRequest extends FormRequest
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
        return [
            'id' => ['required', 'exists:admin_users,id']
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return [
            'id' => '管理ユーザーID'
        ];
    }

    /**
     * @param $validator
     * @return void
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $id = $this->input('id');

            $count = AdminUser::where('id', '<>', $id)->count();

            if ($count === 0) {
                $validator->errors()->add('id', '管理ユーザーは最低１人は必要です');
            }
        });
    }
}
