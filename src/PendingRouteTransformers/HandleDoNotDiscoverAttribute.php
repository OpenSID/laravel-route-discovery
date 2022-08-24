<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use OpenDesa\RouteDiscovery\Attributes\DoNotDiscover;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRouteAction;
use Illuminate\Support\Collection;

class HandleDoNotDiscoverAttribute implements PendingRouteTransformer
{
    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection
    {
        return $pendingRoutes
            ->reject(fn (PendingRoute $pendingRoute) => $pendingRoute->getAttribute(DoNotDiscover::class))
            ->each(function (PendingRoute $pendingRoute) {
                $pendingRoute->actions = $pendingRoute
                    ->actions
                    ->reject(fn (PendingRouteAction $action) => $action->getAttribute(DoNotDiscover::class));
            });
    }
}
