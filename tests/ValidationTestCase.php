<?php

namespace Tests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

abstract class ValidationTestCase extends TestCase
{
    abstract protected function baseInput(): array;

    abstract protected function request(): FormRequest;

    abstract protected function formData();

    protected function makeInput(array $input=[], string $exceptKey = null)
    {
        $baseInput = $this->baseInput();

        $input = array_replace($baseInput, $input);
        $input = Arr::except($input, $exceptKey);

        return $input;
    }

    /**
     * カスタムリクエストのバリデーションテスト
     *
     * @param string 項目名
     * @param string 値
     * @param boolean 期待値(true:バリデーションOK、false:バリデーションNG)
     * @dataProvider formData
     */
    public function testFormValidation($expected, ...$inputs)
    {
        $request = $this->request();
        $rules = $request->rules();
        $input = $this->makeInput(...$inputs);

        $request->merge($input);

        $Validator = Validator::make($input, $rules);

        if (method_exists($request, 'withValidator')) {
            $request->withValidator($Validator);
        }

        $result = $Validator->passes();

        if ($expected !== $result) {
            dump($Validator->errors());
        }

        $this->assertEquals($expected,$result);
    }
}
