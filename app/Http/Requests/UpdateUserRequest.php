<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['nullable', Rule::unique('users')->ignore(Auth::id())],
            'password' => 'nullable',
            'address' => 'nullable',
            'tel' => 'nullable',
        ];
    }

    /**
     * エラーメッセージのカスタマイズ
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'address' => '住所',
            'tel' => '電話番号',
        ];
    }
}
