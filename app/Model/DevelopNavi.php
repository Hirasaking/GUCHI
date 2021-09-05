<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DevelopNavi extends Model
{
    // 表示可能なメニューを取得
    // 必要最低限の条件をscopeで先に設定する
    public function scopeGetShowMenuList(Builder $query){
        return $query->addselect(
            [
                $this->getTable() . '.name',
                $this->getTable() . '.url',
            ]
            )->where('status', config('const.STATUS.SHOW'));
    }
}