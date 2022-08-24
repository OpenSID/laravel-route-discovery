<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DoNotDiscoverMethod;

use OpenDesa\RouteDiscovery\Attributes\DoNotDiscover;

class DoNotDiscoverMethodController
{
    public function method()
    {
    }

    #[DoNotDiscover]
    public function doNotDiscoverMethod()
    {
    }
}
