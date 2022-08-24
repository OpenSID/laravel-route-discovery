<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DoNotDiscoverController;

use OpenDesa\RouteDiscovery\Attributes\DoNotDiscover;

class DoNotDiscoverThisMethodController
{
    public function method()
    {
    }

    #[DoNotDiscover]
    public function doNotDiscoverMethod()
    {
    }
}
