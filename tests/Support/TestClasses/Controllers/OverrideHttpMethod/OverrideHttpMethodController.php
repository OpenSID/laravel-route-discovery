<?php

namespace OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\OverrideHttpMethod;

use OpenDesa\RouteDiscovery\Attributes\Route;
use Illuminate\Foundation\Auth\User;

class OverrideHttpMethodController
{
    #[Route(method: 'delete')]
    public function edit(User $user)
    {
    }
}
