<?php

define('LARAVEL_START', microtime(true));
echo __DIR__;
require '/home/asutoronoka/asutoronoka.xsrv.jp/laravel/vendor/autoload.php';

$app = require_once '/home/asutoronoka/asutoronoka.xsrv.jp/laravel/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
