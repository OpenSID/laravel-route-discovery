<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use Illuminate\Support\Collection;

interface PendingRouteTransformer
{
    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection;
}
