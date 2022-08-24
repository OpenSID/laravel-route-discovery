<?php

namespace OpenDesa\RouteDiscovery\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class Where implements DiscoveryAttribute
{
    public const alpha = '[a-zA-Z]+';
    public const numeric = '[0-9]+';
    public const alphanumeric = '[a-zA-Z0-9]+';
    public const uuid = '[\da-fA-F]{8}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{4}-[\da-fA-F]{12}';
    public string $param;
    public string $constraint;

    public function __construct(string $param, string $constraint)
    {
        $this->param = $param;
        $this->constraint = $constraint;
    }
}
