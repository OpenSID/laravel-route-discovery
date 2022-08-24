<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRouteAction;
use Illuminate\Support\Collection;

class HandleDomainAttribute implements PendingRouteTransformer
{
    public function transform(Collection $pendingRoutes): Collection
    {
        $pendingRoutes->each(function (PendingRoute $pendingRoute) {
            $pendingRoute->actions->each(function (PendingRouteAction $action) use ($pendingRoute) {
                if ($pendingRouteAttribute = $pendingRoute->getRouteAttribute()) {
                    $action->domain = $pendingRouteAttribute->domain;
                }

                if ($actionAttribute = $action->getRouteAttribute()) {
                    $action->domain = $actionAttribute->domain;
                }
            });
        });

        return $pendingRoutes;
    }
}
