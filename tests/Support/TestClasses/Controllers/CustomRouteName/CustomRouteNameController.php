<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\CustomRouteName;

use OpenDesa\RouteDiscovery\Attributes\Route;

class CustomRouteNameController
{
    #[Route(name:'this-is-a-custom-name')]
    public function index()
    {
    }
}
