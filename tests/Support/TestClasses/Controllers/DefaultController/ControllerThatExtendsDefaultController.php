<?php

namespace Fluent\RouteDiscovery\Tests\Support\TestClasses\Controllers\DefaultController;

class ControllerThatExtendsDefaultController extends ControllerWithDefaultLaravelTraits
{
    public function index()
    {
        return 'Default controller';
    }
}
