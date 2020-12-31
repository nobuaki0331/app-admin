<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LogController extends Controller
{
    public function play()
    {
        $started_at = request()->started_at;
        $finished_at = request()->finished_at;

        $query = User::query();
        if ($started_at && $finished_at) {
            $query->whereDate('created_at', '>=', $started_at)
            ->whereDate('created_at', '<=', $finished_at);
        }
        $user = $query->get(['id','name','email','created_at','updated_at','sex_code','permission','address','tel'])->toArray();

        $downloadData = [];
        // 項目名
        $csvHeader = ['id', '名前','メールアドレス', '登録日', '更新日', '性別', '権限', '住所', '電話番号'];
        $downloadData[] = implode(',', $csvHeader);

        foreach($user as $recode) {
            foreach($recode as $i => $v) {
                $recode[$i] = '"' . $v . '"';
            }
            $downloadData[] = implode(',', $recode);
        }

        // 改行区切りの文字列に変換
        $downloadData = implode("\r", $downloadData);
        // EXCEL対応
        $downloadData = mb_convert_encoding($downloadData, "SJIS", "UTF-8");

        return response($downloadData)->withHeaders([
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);
    }
}
