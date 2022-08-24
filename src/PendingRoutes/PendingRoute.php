<?php

namespace OpenDesa\RouteDiscovery\PendingRoutes;

use OpenDesa\RouteDiscovery\Attributes\DiscoveryAttribute;
use OpenDesa\RouteDiscovery\Attributes\Route;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionAttribute;
use ReflectionClass;
use SplFileInfo;

class PendingRoute
{
    /**
     * @var SplFileInfo
     */
    public SplFileInfo $fileInfo;
    /**
     * @var ReflectionClass
     */
    public ReflectionClass $class;
    /**
     * @var string
     */
    public string $uri;
    /**
     * @var string
     */
    public string $fullyQualifiedClassName;
    /**
     * @var Collection<PendingRouteAction>
     */
    public Collection $actions;

    /**
     * @param SplFileInfo $fileInfo
     * @param ReflectionClass $class
     * @param string $uri
     * @param string $fullyQualifiedClassName
     * @param Collection<PendingRouteAction> $actions
     */
    public function __construct(SplFileInfo $fileInfo, ReflectionClass $class, string $uri, string $fullyQualifiedClassName, Collection $actions)
    {
        $this->fileInfo = $fileInfo;
        $this->class = $class;
        $this->uri = $uri;
        $this->fullyQualifiedClassName = $fullyQualifiedClassName;
        $this->actions = $actions;
    }

    public function namespace(): string
    {
        return Str::beforeLast($this->fullyQualifiedClassName, '\\');
    }

    public function shortControllerName(): string
    {
        return Str::of($this->fullyQualifiedClassName)
            ->afterLast('\\')
            ->beforeLast('Controller');
    }

    public function childNamespace(): string
    {
        return $this->namespace() . '\\' . $this->shortControllerName();
    }

    public function getRouteAttribute(): ?Route
    {
        return $this->getAttribute(Route::class);
    }

    /**
     * @template TDiscoveryAttribute of DiscoveryAttribute
     *
     * @param class-string<TDiscoveryAttribute> $attributeClass
     *
     * @return ?TDiscoveryAttribute
     */
    public function getAttribute(string $attributeClass): ?DiscoveryAttribute
    {
        $attributes = method_exists($this->class, 'getAttributes') ? $this->class->getAttributes($attributeClass, ReflectionAttribute::IS_INSTANCEOF) : [];

        if (! count($attributes)) {
            return null;
        }

        return $attributes[0]->newInstance();
    }
}
