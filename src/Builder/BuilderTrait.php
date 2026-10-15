<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Fixtures\Factory\Factory;
use Proceda\Schema;

trait BuilderTrait
{
    public static function new(
        ?Schema $schema = null,
    ): static {
        if ($schema !== null) {
            Factory::useFields(
                $schema->fields,
            );
        }

        return new static();
    }

    /**
     * @param null|callable(static): mixed $configure
     */
    public static function lazy(
        ?callable $configure = null,
    ): \Closure {
        return static function (...$arguments) use ($configure) {
            $builder = static::create(...$arguments);

            if ($configure !== null) {
                $configure($builder);
            }

            try {
                return $builder->build();
            } finally {
                BuilderContext::back();
            }
        };
    }
}
