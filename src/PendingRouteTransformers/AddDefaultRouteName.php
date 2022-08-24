<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRouteAction;
use Illuminate\Support\Collection;

class AddDefaultRouteName implements PendingRouteTransformer
{
    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection
    {
        $pendingRoutes->each(function (PendingRoute $pendingRoute) {
            $pendingRoute->actions
                ->reject(fn (PendingRouteAction $action) => $action->name)
                /** @phpstan-ignore-next-line */
                ->each(fn (PendingRouteAction $action) => $action->name = $this->generateRouteName($action));
        });

        return $pendingRoutes;
    }

    protected function generateRouteName(PendingRouteAction $pendingRouteAction): string
    {
        return collect(explode('/', $pendingRouteAction->uri))
            ->reject(fn (string $segment) => strncmp($segment, '{', strlen('{')) === 0)
            ->join('.');
    }
}
