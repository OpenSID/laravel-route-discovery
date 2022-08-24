<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\Middleware;

use OpenDesa\RouteDiscovery\Attributes\Route;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Middleware\TestMiddleware;

class MiddlewareOnMethodController
{
    #[Route(middleware: TestMiddleware::class)]
    public function extraMiddleware()
    {
    }

    public function noExtraMiddleware()
    {
    }
}
