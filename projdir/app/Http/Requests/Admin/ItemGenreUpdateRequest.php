<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemGenreUpdateRequest extends FormRequest
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
        $id = $this->genre_id;

        if (empty($id)) {
            return [
                'name' => ['required', 'unique:genres'],
            ];
        }

        return [
            'genre_id' => ['required', 'exists:genres,id'],
            'name' => ['required', Rule::unique('genres', 'name')->ignore($id)],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes(): array
    {
        return [
            'genre_id' => 'ジャンルID',
            'name' => 'ジャンル名',
        ];
    }
}
