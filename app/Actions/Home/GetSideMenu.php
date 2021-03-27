<?php

namespace App\Actions\Home;

use Illuminate\Support\Facades\Gate;

class GetSideMenu
{
    public function execute():  array
    {
      $items = [];

      if (Gate::allows('account-index')) {
        $items[] = [
          'title' => 'アカウント',
          'icon' => 'mdi-account-box',
          'name' => 'account',
        ];
      }
      if (Gate::allows('account-index')) {
        $items[] = [
          'title' => 'ログ一覧',
          'icon' => 'mdi-gavel',
          'name' => 'log',
        ];
      }
      if (Gate::allows('vuex-index')) {
        $items[] = [
          'title' => '管理者へ問合せ',
          'icon' => 'mdi-eye',
          'name' => 'contact',
        ];
      }
      $items[] = [
        'title' => '画像アップロード',
        'icon' => '',
        'name' => 'image'
      ];

      return $items;
    }
}
