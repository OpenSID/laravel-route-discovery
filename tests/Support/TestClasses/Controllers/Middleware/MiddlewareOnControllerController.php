<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\Middleware;

use OpenDesa\RouteDiscovery\Attributes\Route;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Middleware\OtherTestMiddleware;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Middleware\TestMiddleware;

#[Route(middleware: TestMiddleware::class)]
class MiddlewareOnControllerController
{
    public function oneMiddleware()
    {
    }

    #[Route(middleware: OtherTestMiddleware::class)]
    public function twoMiddleware()
    {
    }
}
