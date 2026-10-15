<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Embarque;

final class EmbarqueFactory extends Factory
{
    public static function create(): Embarque
    {
        return new Embarque(
            identificacao: self::alphanumeric(
                'identificacao',
                'ID-EMBARQUE-###',
            ),
        );
    }
}
