<?php

namespace OpenDesa\RouteDiscovery\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Prefix implements DiscoveryAttribute
{
    public string $prefix;

    public function __construct(string $prefix)
    {
        $this->prefix = $prefix;
    }
}
