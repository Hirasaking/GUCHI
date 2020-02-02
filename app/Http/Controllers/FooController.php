<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooController extends Controller
{
    public function __invoke(Request $request)
    {
      $foo = $request->input('foo');

      $bar = dispatch_now(new FooJob($foo));
      App\Jobs\FooJob::dispatch();

      return view('foo')->with(compact('bar'));
    }
}
