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
          'title' => 'Vuex',
          'icon' => 'mdi-eye',
          'name' => 'hoge',
        ];
      }

      return $items;
    }
}
