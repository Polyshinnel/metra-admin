<?php

use App\Middleware\BasicAuthMiddleware;
use App\Pages\AuthPage;
use App\Pages\IndexPage;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app): void {
    $app->get('/auth', [AuthPage::class, 'get']);
    $app->post('/auth', [AuthPage::class, 'authorize']);

    $app->group('/',function (RouteCollectorProxy $group) {
        $group->get('',[IndexPage::class,'get']);
    })->add(BasicAuthMiddleware::class);;
};