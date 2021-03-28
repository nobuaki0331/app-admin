<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;

class PrefectureController extends Controller
{
    public function getPrefecture()
    {
        $prefectures = Prefecture::all();
        return response($prefectures);
    }
}
