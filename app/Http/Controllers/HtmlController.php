<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class HtmlController extends Controller
{

  /**
   * 一覧表示
   *
   * @param Request $request
   * @return Response
   */
    public function index(Request $request){

      // $directory = "/Users/blueegg/Documents/tomoyukis folder/laravel/docker/dev3_bet365";
      $files = \Storage::files('local');
      $messages = [];

      // TODO ディレクトリが存在しなければ追加、EXCEPTION処理追加
      // TODO 保存先ディレクトリをmonorate_dataにする
      // \Storage::makeDirectory('tennis_data');
      $file_name = 'Tennis_data_sample.html';
      $file_exist = Storage::disk('local')->exists($file_name);

      if ($file_exist) {

          $file_path = Storage::disk('local')->url($file_name);
          $content_list = Storage::get($file_name);
          // 改行コードを削除 すべての改行（CR/LF/CR+LF）に対応
          // http://www.koikikukan.com/archives/2013/07/12-011111.php
          $content_list = str_replace(array("\r\n", "\r", "\n"), '', $content_list);;

          // 空白を削除 https://ysklog.net/php/2997.html
          $content_list  = preg_replace("/( |　)/", "", $content_list );

          // その他不要な文字を削除
          $content_list  = preg_replace("/(\t)/", "", $content_list );

          // タグの存在数チェック
          $count = substr_count($content_list, '<tbody><trclass="head">');
          $messages[] = 'Tableタグの数：' . $count . '<br>';

          // タグの存在数チェック
          // $count = substr_count($content_list, '<td class="first time" rowspan="2">');
          // $messages[] = 'Tableタグの数：' . $count . '<br>';

          // 分割する箇所
          $split_tag = [];
          $split_tag[] = '<tbody>';
          $split_tag[] = '</tbody>';
          $split_tag[] = '<tdclass="firsttime"rowspan="2">';
          $split_tag[] = '<br/><imgsrc=';
          $split_tag[] = '<<br/>&nbsp;';

          // テーブルの数に合わせて不要なタグを削除
          if ($count === 1) {
            // 開始終了タグでトリミング
            $content_list = explode($split_tag[0], $content_list);
            $content_list = explode($split_tag[1], $content_list[1]);
            // 必要なタグのみ抽出
            $content_list = $content_list[0];
          } else {

          }

          $content_list = explode($split_tag[2], $content_list);
          // 試合リストを初期化
          $game_list = [];

          foreach ($content_list as $content) {
            // 1.時間を追加
            // 先頭の５文字を取り出す　例:15:30<br/>
            $rest = substr($content, 0, 5);
            // 時間形式か確認 :を含む場合続行
            // TODO carbonで共通のヘルパ処理にしたほうがいいかも
            if (strpos($rest, ':') == false) {
              continue;
            }
            // 試合リストに時間を追加
            $game_list[]['time'] = $rest;

            // 2.名前を取得
            /*
            <ahref="/player/　の位置確認
            /">の位置確認

            <ahref="/player/karatsev/">KaratsevA.</a></td><tdclass="nbr">&nbsp;</td>
            <ahref="/player/rublev/">RublevA.</a>(3)</td><tdclass="nbr">&nbsp;</td>
            */

            // 検索対象のワード
            $search_word1 = '<ahref="/player/'; // 開始条件
            $search_word2 = '</a></td>'; // 終了条件パターン１
            $search_word3 = '">'; // 終了条件パターン２
            $search_word4 = '">'; // 抽出パターン
            // 検索対象の位置を確認
            $search_word_pos1 = strpos($content, $search_word1);
            $search_word_pos2 = strpos($content, $search_word2);
            $search_word_pos3 = strpos($content, $search_word3);

            // 名前を含む部分を抽出　例：<ahref="/player/harris-9f62b/">HarrisL.
            $rest = substr($content, $search_word_pos1, $search_word_pos2 - $search_word_pos1);
            // 名前部分だけを抽出　HarrisL.
            $search_word_pos4 = strpos($rest, $search_word4) + strlen($search_word4); 
            $temp1 = strlen($rest);
            $temp2 = $temp1 - $search_word_pos4;
            $rest = substr($rest, $search_word_pos4, $temp2);
            // 試合リストに選手名を追加
            $game_list[]['time'] = $rest;

          // var_dump($rest);
          // exit;

          }
          var_dump($game_list);
          exit;

          // <tdclass="h2h">0</td>

          dd($content_list);
          exit;

          // $content_list = explode($split_tag[1], $content_list[1]);
          // $files = Storage::allFiles('local');
          // var_dump($file_exists);
          // var_dump($files);
          // var_dump($file_path);
          for ($i=0; $i<count($messages); $i++) {
            echo $messages[$i];
          }

          // dd($data);

      }

      // if (\File::exists($file)) {
      //     echo "ファイルがあります！";
      // }

      // try {
      //     $content_lists = \File::get($file);
      // } catch (\Illuminate\Filesystem\FileNotFoundException $exception) {
      //     die("ファイルがありません");
      // }
            // $url = "https://mnrate.com/item/aid/4086179296";
      // $html = file_get_contents($url);
      //
      // $html  = preg_replace("/( |　)/", "", $html );
      // //文字列の中にある半角空白と全角空白をすべて削除・除去する
      // // $string = str_replace(array(" ", "　"), "", $string);
      // $html = explode('ランキング,価格推移,価格比較,モノレート">', $html);
      // dd($html);

    }
}
