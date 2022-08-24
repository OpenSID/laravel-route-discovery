<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\OverrideUri;

use OpenDesa\RouteDiscovery\Attributes\Route;

class OverrideUriController
{
    #[Route(uri:'alternative-uri')]
    public function myMethod()
    {
    }
}
