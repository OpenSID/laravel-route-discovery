<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DefaultController;

class ControllerThatExtendsDefaultController extends ControllerWithDefaultLaravelTraits
{
    public function index()
    {
        return 'Default controller';
    }
}
