<?php

namespace Tests\Requests;

use App\Http\Requests\CreateUserRequest;
use Illuminate\Foundation\Http\FormRequest;
use Tests\ValidationTestCase;

class CreateUserRequestTest extends ValidationTestCase
{
    public function request(): FormRequest
    {
        return new CreateUserRequest();
    }

    public function baseInput(): array
    {
        return [
          'name' => 'hoge',
          'email' => 'hoge@hoge.hoge',
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
              false, [], 'email',
            ],

            'passwordが存在しない' => [
              false, [], 'password',
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
