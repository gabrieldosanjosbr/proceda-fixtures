<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Imposto;

final class ImpostoFactory extends Factory
{
    public static function create(): Imposto
    {
        return new Imposto(
            condicaoTributaria: self::type('condicaoTributaria'),
            direitoFiscal: self::type('direitoFiscal'),
            incidenciaIcms: self::type('incidenciaIcms'),
            tratamento: self::type('tratamento'),
            tributos: [],
        );
    }
}
