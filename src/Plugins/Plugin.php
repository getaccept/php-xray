<?php

namespace Pkerrigan\Xray\Plugins;

interface Plugin
{
    public function isIndependent(): bool;
    public function getName(): string;
    public function getData(): array;
}
