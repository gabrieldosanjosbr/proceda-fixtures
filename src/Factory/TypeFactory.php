<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Collection\TypeCollection;
use Proceda\Service\TypeResolver;
use Proceda\Type;

final class TypeFactory
{
    private static ?TypeResolver $resolver = null;

    private static function resolver(): TypeResolver
    {
        return self::$resolver ??= TypeResolver::yaml();
    }

    public static function get(string $path): Type
    {
        return self::resolver()->resolve($path);
    }

    public static function getTypeCollection(
        string $path,
        string|array|null $allowed = null,
        array $excluded = [],
    ): TypeCollection {
        return self::resolver()->getTypeCollection(
            $path,
            $allowed,
            $excluded,
        );
    }
}
