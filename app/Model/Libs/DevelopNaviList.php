<?php

namespace App\Model\Libs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Model\DevelopNavi;

class DevelopNaviList extends Model
{
    protected $developNavi;

    public function __construct()
    {
        //　開発リストテーブルから取得
        $this->developNavi = new DevelopNavi();
    }

    public function find(){
        // キャッシュ名は一意の名前
        $cacheKey = __CLASS__ . "-" . __FUNCTION__;

        // キャッシュに存在するならDB取得しない　保持期限120分
        return Cache::remember($cacheKey, 0, function(){
            $developNaviList = $this->developNavi->GetShowMenuList()->get();

            return $developNaviList;
        });

    }
}