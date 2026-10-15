<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Nfe;

final class NfeFactory extends Factory
{
    public static function create(): Nfe
    {
        return new Nfe(
            codigo: self::numerify('codigo'),
            chaveAcesso: self::numerify('chaveAcesso'),
            protocolo: self::numerify('codigo'),
        );
    }
}
