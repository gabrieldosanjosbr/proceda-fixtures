<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Unidade;

final class UnidadeFactory extends Factory
{
    public static function create(): Unidade
    {
        return new Unidade(
            identificacao: self::alphanumeric(
                'identificacao',
                'FIL-####',
            ),
            uf: self::uf(),
        );
    }
}
