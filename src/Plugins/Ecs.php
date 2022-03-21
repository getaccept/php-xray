<?php

namespace Pkerrigan\Xray\Plugins;

/**
 * Adds Ecs data to the Segment
 *
 * Borrowed from:
 * https://github.com/aws/aws-xray-sdk-node/blob/master/packages/core/lib/segments/plugins/ecs_plugin.js
 *
 * Class Ecs
 * @package Pkerrigan\Xray\Plugins
 */
class Ecs implements Plugin
{

    public function isIndependent(): bool
    {
        return false;
    }

    public function getName(): string
    {
        return "";
    }

    public function getData(): array
    {
        return [
            'ecs' => [
                'container' => gethostname()
            ],
            'origin' => 'AWS::ECS::Container'
        ];
    }
}
