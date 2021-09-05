<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sale;

class IndexController extends Controller
{

    public function __construct(){
    }

    public function index()
    {
        $sales = (new Sale)->getIndexSaleList()->get();

        return view('index.index',compact('sales', $sales));
    }

    public function param($param)
    {
        dd($param);
    }

}
