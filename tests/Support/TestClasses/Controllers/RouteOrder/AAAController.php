<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\RouteOrder;

use OpenDesa\RouteDiscovery\Attributes\Route;

class AAAController
{
    #[Route(fullUri: '{parameter}')]
    public function invoke()
    {
    }
}
