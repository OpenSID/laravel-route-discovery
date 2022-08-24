<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\OverrideFullUri;

use OpenDesa\RouteDiscovery\Attributes\Route;

class OverrideFullUriController
{
    #[Route(fullUri:'alternative-uri')]
    public function myMethod()
    {
    }
}
