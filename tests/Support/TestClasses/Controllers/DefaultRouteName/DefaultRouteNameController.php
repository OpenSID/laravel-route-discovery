<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DefaultRouteName;

use OpenDesa\RouteDiscovery\Attributes\Route;
use Illuminate\Foundation\Auth\User;

class DefaultRouteNameController
{
    public function method()
    {
    }

    public function edit(User $user)
    {
    }

    #[Route(name: 'special-name')]
    public function specialMethod()
    {
    }
}
