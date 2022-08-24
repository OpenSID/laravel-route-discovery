<?php

namespace OpenDesa\RouteDiscovery\PendingRouteTransformers;

use App\Http\Controllers\Controller as DefaultAppController;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRoute;
use OpenDesa\RouteDiscovery\PendingRoutes\PendingRouteAction;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DefaultController\ControllerWithDefaultLaravelTraits;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;

class RejectDefaultControllerMethodRoutes implements PendingRouteTransformer
{
    /**
     * @var array<int, string>
     */
    public array $rejectMethodsInClasses = [
        ControllerWithDefaultLaravelTraits::class,
        DefaultAppController::class,
        Controller::class,
    ];

    /**
     * @param Collection<PendingRoute> $pendingRoutes
     *
     * @return Collection<PendingRoute>
     */
    public function transform(Collection $pendingRoutes): Collection
    {
        return $pendingRoutes->each(function (PendingRoute $pendingRoute) {
            $pendingRoute->actions = $pendingRoute
                ->actions
                ->reject(fn (PendingRouteAction $pendingRouteAction) => in_array(
                    $pendingRouteAction->method->class,
                    $this->rejectMethodsInClasses
                ));
        });
    }
}
