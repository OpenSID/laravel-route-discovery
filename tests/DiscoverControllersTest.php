<?php

use OpenDesa\RouteDiscovery\Discovery\Discover;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\CustomMethod\CustomMethodController;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\DefaultController\ControllerThatExtendsDefaultController;
use OpenDesa\RouteDiscovery\Tests\Support\TestClasses\Controllers\Single\MyController;
use Illuminate\Support\Facades\Route;

it('can discover controller in a directory', function () {
    Discover::controllers()
        ->useRootNamespace('OpenDesa\RouteDiscovery\Tests\\')
        ->useBasePath($this->getTestPath())
        ->in(controllersPath('Single'));

    $this
        ->assertRegisteredRoutesCount(1)->assertRouteRegistered(MyController::class, controllerMethod: 'index', uri: 'my');
});

it('does not discover routes for default Laravel skeleton controllers that have public methods', function () {
    Discover::controllers()
        ->useRootNamespace('OpenDesa\RouteDiscovery\Tests\\')
        ->useBasePath($this->getTestPath())
        ->in(controllersPath('DefaultController'));

    $this
        ->assertRegisteredRoutesCount(1)->assertRouteRegistered(ControllerThatExtendsDefaultController::class, controllerMethod: 'index', uri: 'controller-that-extends-default');
});

it('can discover controllers with custom methods', function () {
    Discover::controllers()
        ->useRootNamespace('OpenDesa\RouteDiscovery\Tests\\')
        ->useBasePath($this->getTestPath())
        ->in(controllersPath('CustomMethod'));

    $this
        ->assertRegisteredRoutesCount(1)
        ->assertRouteRegistered(
            CustomMethodController::class,
            controllerMethod: 'myCustomMethod',
            uri: 'custom-method/my-custom-method'
        );
});

it('can use a prefix when discovering routes', function () {
    Route::prefix('my-prefix')->group(function () {
        Discover::controllers()
            ->useRootNamespace('OpenDesa\RouteDiscovery\Tests\\')
            ->useBasePath(test()->getTestPath())
            ->in(controllersPath('Single'));
    });

    $this
        ->assertRegisteredRoutesCount(1)->assertRouteRegistered(MyController::class, controllerMethod: 'index', uri: 'my-prefix/my');
});
