<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){

    }

    /**
     * 登録画面の表示
     *
     * @param  Request $request
     * @return Response
     */
    public function create(Request $request){
        return view('comment.create');
    }
}
