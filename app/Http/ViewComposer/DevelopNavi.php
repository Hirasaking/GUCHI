<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Model\Libs\DevelopNaviList;

class DevelopNavi{

    public $developNaviList;

    // 複数モデル集約したDevelopNaviListモデルを取得
    public function __construct(DevelopNaviList $developNaviList)
    {
        // 依存はサービスコンテナにより自動的に解決される
        $this->developNaviList = $developNaviList;
    }

    public function compose(View $view){
        // リストを取得
        $developNaviList = $this->developNaviList->find();

        // 対象のviewへ変数を渡す
        
        $view->with(compact('developNaviList'));
    }

}
