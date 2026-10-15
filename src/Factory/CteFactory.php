<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Conhecimento\Cte;

final class CteFactory extends Factory
{
    public static function create(): Cte
    {
        return new Cte(
            modelo: self::alphanumeric('modelo'),
            chaveAcesso: self::numerify('chaveAcesso'),
            protocolo: self::numerify('codigo'),
        );
    }
}
