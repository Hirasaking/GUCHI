<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composers([
            \App\Http\ViewComposer\DevelopNavi::class => 'partials.developNavi', // 開発用メニュー
        ]);
        // 全てのviewで使用
        // View::composer('*', function($view) {
        //     $view->with('phpmyadmin', 'http://localhost:3000/');
        // });
    }
}
