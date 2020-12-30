<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function play()
    {
        $started_at = request()->started_at;
        $finished_at = request()->finished_at;

        $member = [
            [
                'id' => 1,
                'name' => 'hoge1',
                'age' => 20,
            ],
            [
                'id' => 1,
                'name' => 'hoge1',
                'age' => 20,
            ],
            [
                'id' => 1,
                'name' => 'hoge1',
                'age' => 20,
            ],
        ];

        return response($member)->withHeaders([
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);
    }
}
