<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\BuilderContext;
use Proceda\Layout;

abstract class Scenario
{
    protected static function initialize(
        Layout $layout,
    ): void {
        BuilderContext::initialize(
            $layout->getSchemaManager(),
        );
    }
}