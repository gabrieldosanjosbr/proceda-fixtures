<?php

namespace Proceda\Fixtures\Builder;

use Proceda\Fixtures\Factory\Factory;
use Proceda\Schema;
use Proceda\Schema\Manager;

/**
 * Nested builders must be created lazily because their
 * Schema context is part of the construction lifecycle.
 */
final class BuilderContext
{
    private static ?Schema $schema = null;

    /** @var Schema[] */
    private static array $stack = [];

    public static function initialize(
        Manager $schemaManager,
    ): void {
        self::$schema = $schemaManager->getRootSchema();

        Factory::useFields(
            fields: self::$schema->fields,
        );
    }

    public static function child(string $property): void
    {
        foreach (self::$schema->children as $child) {
            if (
                $child->property !== $property
                && basename($child->path) !== $property
            ) {
                continue;
            }

            self::$stack[] = self::$schema;
            self::$schema = $child;

            Factory::useFields(
                fields: self::$schema->fields,
            );

            return;
        }

        throw new \LogicException(sprintf(
            'Schema property "%s" does not exist in "%s".',
            $property,
            self::$schema->path,
        ));
    }

    public static function back(): void
    {
        $parent = array_pop(self::$stack);

        if ($parent === null) {
            throw new \LogicException(
                'Cannot go back from the root schema.',
            );
        }

        self::$schema = $parent;

        Factory::useFields(
            fields: self::$schema->fields,
        );
    }
}
