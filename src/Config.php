<?php

namespace OpenDesa\RouteDiscovery;

use OpenDesa\RouteDiscovery\PendingRouteTransformers\AddControllerUriToActions;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\AddDefaultRouteName;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleDomainAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleDoNotDiscoverAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleFullUriAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleHttpMethodsAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleMiddlewareAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleRouteNameAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleUriAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleUrisOfNestedControllers;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\HandleWheresAttribute;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\MoveRoutesStartingWithParametersLast;
use OpenDesa\RouteDiscovery\PendingRouteTransformers\RejectDefaultControllerMethodRoutes;

class Config
{
    /**
     * @return array<class-string>
     */
    public static function defaultRouteTransformers(): array
    {
        return [
            RejectDefaultControllerMethodRoutes::class,
            HandleDoNotDiscoverAttribute::class,
            AddControllerUriToActions::class,
            HandleUrisOfNestedControllers::class,
            HandleRouteNameAttribute::class,
            HandleMiddlewareAttribute::class,
            HandleHttpMethodsAttribute::class,
            HandleUriAttribute::class,
            HandleFullUriAttribute::class,
            HandleWheresAttribute::class,
            AddDefaultRouteName::class,
            HandleDomainAttribute::class,
            MoveRoutesStartingWithParametersLast::class,
        ];
    }
}
