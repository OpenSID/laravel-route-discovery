<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\Single;

class MyController
{
    public function index()
    {
        return get_class($this) . '@' . __METHOD__;
    }
}
