<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRouteAction;
use Illuminate\Support\Collection;

class MoveRoutesStartingWithParametersLast implements PendingRouteTransformer
{
    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection
    {
        return $pendingRoutes->sortBy(function (PendingRoute $pendingRoute) {
            $containsRouteStartingWithUri = $pendingRoute->actions->contains(function (PendingRouteAction $action) {
                return strncmp($action->uri, '{', strlen('{')) === 0;
            });

            if (! $containsRouteStartingWithUri) {
                return 0;
            }

            return $pendingRoute->actions->max(function (PendingRouteAction $action) {
                if (strncmp($action->uri, '{', strlen('{')) !== 0) {
                    return PHP_INT_MAX;
                }

                return PHP_INT_MAX - count(explode('/', $action->uri));
            });
        })
            ->values();
    }
}
