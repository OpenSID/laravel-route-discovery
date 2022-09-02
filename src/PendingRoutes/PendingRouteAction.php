<?php

namespace OpenDesa\RouteDiscovery\PendingRoutes;

use OpenDesa\RouteDiscovery\Attributes\DiscoveryAttribute;
use OpenDesa\RouteDiscovery\Attributes\Route;
use OpenDesa\RouteDiscovery\Attributes\Where;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use ReflectionAttribute;
use ReflectionMethod;

class PendingRouteAction
{
    public ReflectionMethod $method;
    public string $uri;
    /** @var array<int, string> */
    public array $methods = [];

    /** @var array{class-string, string} */
    public array $action;

    /** @var array<int, class-string> */
    public array $middleware = [];

    /** @var array<string, string> */
    public array $wheres = [];
    public ?string $name = null;

    public ?string $domain = null;

    /**
     * @param ReflectionMethod $method
     * @param class-string $controllerClass
     */
    public function __construct(ReflectionMethod $method, string $controllerClass)
    {
        $this->method = $method;

        $this->uri = $this->relativeUri();

        $this->methods = $this->discoverHttpMethods();

        $this->action = [$controllerClass, $method->name];
    }

    public function relativeUri(): string
    {
        $uri = $this->method->getName();

        if (! in_array($this->method->getName(), $this->commonControllerMethodNames())) {
            $uri = Str::kebab($this->method->getName());
        }

        return $uri;
    }

    public function addWhere(Where $whereAttribute): self
    {
        $this->wheres[$whereAttribute->param] = $whereAttribute->constraint;

        return $this;
    }

    /**
     * @param array<class-string>|class-string $middleware
     *
     * @return self
     */
    public function addMiddleware($middleware): self
    {
        $middleware = Arr::wrap($middleware);

        $allMiddleware = array_merge($middleware, $this->middleware);

        $this->middleware = array_unique($allMiddleware);

        return $this;
    }

    /**
     * @return array<int, string>
     */
    protected function discoverHttpMethods(): array
    {
        return ['GET', 'POST'];
    }

    /**
     * @return array<int, string>
     */
    protected function commonControllerMethodNames(): array
    {
        return [
            'index', '__invoke', 'get',
            'show', 'store', 'update',
            'destroy', 'delete',
        ];
    }

    /**
     * @return string|array{string, string}
     */
    public function action()
    {
        return $this->action[1] === '__invoke'
            ? $this->action[0]
            : $this->action;
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
        $attributes = method_exists($this->method, 'getAttributes') ? $this->method->getAttributes($attributeClass, ReflectionAttribute::IS_INSTANCEOF) : [];

        if (! count($attributes)) {
            return null;
        }

        return $attributes[0]->newInstance();
    }
}
