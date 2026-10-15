<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Imposto\Tributo;
use Proceda\Type;

class TributoFactory extends Factory
{
    public static function create(Type $tipo): Tributo
    {
        return new Tributo(
            tipo: $tipo,
            baseCalculo: self::decimal('baseCalculo'),
            aliquota: self::decimal('aliquota'),
            valor: self::decimal('valor'),
            valorRetido: self::decimal('valorRetido'),
            substituicaoTributaria: self::type(
                'substituicaoTributaria',
            ),
        );
    }
}
