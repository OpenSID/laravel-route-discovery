<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DoNotDiscoverController;

use OpenDesa\RouteDiscovery\Attributes\DoNotDiscover;

#[DoNotDiscover]
class DoNotDiscoverController
{
    public function doNotDiscoverThisController()
    {
    }
}
