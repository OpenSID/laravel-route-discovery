<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRouteAction;
use Illuminate\Support\Collection;

class HandleMiddlewareAttribute implements PendingRouteTransformer
{
    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection
    {
        $pendingRoutes->each(function (PendingRoute $pendingRoute) {
            $pendingRoute->actions->each(function (PendingRouteAction $action) use ($pendingRoute) {
                if ($pendingRouteAttribute = $pendingRoute->getRouteAttribute()) {
                    $action->addMiddleware($pendingRouteAttribute->middleware);
                }

                if ($actionRouteAttribute = $action->getRouteAttribute()) {
                    $action->addMiddleware($actionRouteAttribute->middleware);
                }
            });
        });

        return $pendingRoutes;
    }
}
