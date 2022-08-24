<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\RouteOrder;

use OpenDesa\RouteDiscovery\Attributes\Route;

class MiddleController
{
    #[Route(fullUri: '{parameter}/extra')]
    public function invoke()
    {
    }
}
