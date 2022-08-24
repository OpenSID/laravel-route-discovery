<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\Domain;

use OpenDesa\RouteDiscovery\Attributes\Route;

#[Route(domain: 'first.example.com')]
class DomainController
{
    public function method()
    {
    }

    #[Route(domain: 'second.example.com')]
    public function anotherMethod()
    {
    }
}
