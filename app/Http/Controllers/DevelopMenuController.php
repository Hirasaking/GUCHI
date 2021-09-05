<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopMenuController extends Controller
{
    public function command()
    {
        echo 'seederの更新：：composer dump-autoload';
        echo '<br>';
        echo 'migrate & seed：：php artisan migrate:fresh --seed';

    }
}
