<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class ValiController extends Controller
{
  public function index()
  {
    return view('sample_vali');
  }

  public function receiveData(Request $request)
  {
    // バリデーションルール
    // $validater = Validator::make($request->all(), [
    //   'name' => 'required',
    //   'gender' => 'required',
    // ]);

    // if ($validater->fails()) {
    //
    //   var_dump($validator);exit;
    // return redirect('post/create')
    //             ->withErrors($validator)
    //             ->withInput();
// }
    // $validatedData = $request->validate([
    //     'name' => 'required',
  // ]);
    $validator = Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'gender' => 'required',
      'age' => 'required|integer',
      'file' => 'required|file|image|max:10000',
      'comment' => 'required',
    ]);


    // バリデーションエラーだった場合
    if ($validator->fails()) {
      return redirect('/sample/vali')
            ->withErrors($validator)
            ->withInput();
      var_dump($validator);exit;
    }

    return view('sample_vali', $var);
  }
}
