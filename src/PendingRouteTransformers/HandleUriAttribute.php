<?php

namespace Fluent\RouteDiscovery\PendingRouteTransformers;

use Fluent\RouteDiscovery\PendingRoutes\PendingRoute;
use Fluent\RouteDiscovery\PendingRoutes\PendingRouteAction;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class HandleUriAttribute implements PendingRouteTransformer
{
    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection
    {
        $pendingRoutes->each(function (PendingRoute $pendingRoute) {
            $pendingRoute->actions->each(function (PendingRouteAction $action) {
                if (! $routeAttribute = $action->getRouteAttribute()) {
                    return;
                }

                if (! $routeAttributeUri = $routeAttribute->uri) {
                    return;
                }

                $baseUri = Str::beforeLast($action->uri, '/');
                $action->uri = $baseUri . '/' . $routeAttributeUri;
            });
        });

        return $pendingRoutes;
    }
}
