<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Transportador;

final class TransportadorFactory extends Factory
{
    public static function create(): Transportador
    {
        return new Transportador(
            empresa: EmpresaFactory::create(),
            ocorrencias: [],
            cobrancas: [],
            conhecimentos: [],
        );
    }
}
