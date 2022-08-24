<?php

namespace OpenDesa\RouteDiscovery\Attributes;

use Attribute;
use Illuminate\Routing\Router;
use Illuminate\Support\Arr;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
class Route implements DiscoveryAttribute
{
    /** @var array<int, string> */
    public array $methods;

    /** @var array<int, class-string> */
    public array $middleware;
    /**
     * @var string|null
     */
    public ?string $uri = null;
    /**
     * @var string|null
     */
    public ?string $fullUri = null;
    /**
     * @var string|null
     */
    public ?string $name = null;
    public ?string $domain = null;

    /**
     * @param array<int, string>|string $method
     * @param string|null $uri
     * @param string|null $fullUri
     * @param string|null $name
     * @param array<int, class-string>|string $middleware
     */
    public function __construct($method = [], ?string $uri = null, ?string $fullUri = null, ?string $name = null, $middleware = [], ?string $domain = null)
    {
        $this->uri = $uri;
        $this->fullUri = $fullUri;
        $this->name = $name;
        $this->domain = $domain;
        $methods = Arr::wrap($method);
        $this->methods = collect($methods)
            ->map(fn (string $method) => strtoupper($method))
            ->filter(fn (string $method) => in_array($method, Router::$verbs))
            ->toArray();
        $this->middleware = Arr::wrap($middleware);
    }
}
