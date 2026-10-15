<?php

namespace Proceda\Fixtures;

use Proceda\Schema\LayoutType;

final class EdiPath
{
    public static function for(
        LayoutType $type,
        string $fileName,
    ): string {
        return sprintf(
            '%s/edi/%s/%s.txt',
            dirname(__DIR__),
            $type->value,
            $fileName,
        );
    }
}