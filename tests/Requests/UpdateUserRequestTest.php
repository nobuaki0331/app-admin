<?php

namespace Tests\Requests;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Tests\ValidationTestCase;

class UpdateUserRequestTest extends ValidationTestCase
{
    public function request(): FormRequest
    {
        return new UpdateUserRequest();
    }

    public function baseInput(): array
    {
        return [
          'name' => 'hoge',
          'email' => 'hoge1234@hoge.hoge',
          'password' => 'hogehoge',
          'address' => 'hogehoge',
          'tel' => '090-1234-5678',
        ];
    }

    public function formData()
    {
        return [
            'All ok' => [
                true,
            ],

            'nameが存在しない' => [
              false, [], 'name',
            ],

            'emailが存在しない' => [
              true, [], 'email',
            ],

            'passwordが存在しない' => [
              true, [], 'password',
            ],

            'addressが存在しない' => [
              true, [], 'address',
            ],

            'telが存在しない' => [
              true, [], 'tel',
            ],
        ];
    }
}
