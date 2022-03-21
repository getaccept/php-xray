<?php

namespace Pkerrigan\Xray\Plugins;

/**
 * Adds Lambda data to the Segment
 *
 * Class Lambda
 * @package Pkerrigan\Xray\Plugins
 */
class Lambda implements Plugin
{
    private $functionArn;

    public function __construct(string $functionArn)
    {
        $this->functionArn = $functionArn;
    }

    public function isIndependent(): bool
    {
        return true;
    }

    public function getName(): string
    {
        return "Lambda";
    }

    public function getData(): array
    {
        return [
            'function_arn' => $this->functionArn,
            'origin' => 'AWS::Lambda::Function'
        ];
    }
}
