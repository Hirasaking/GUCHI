<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
{
    protected $session;

    public function __construct()
    {

    }

    public function index(Request $request)
    {
      Log::debug('An informational message.');
      $items[] = 111;
      return view('test.index', [
          'items' => $items
      ]);
    }
}
