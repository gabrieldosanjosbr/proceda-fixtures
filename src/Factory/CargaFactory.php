<?php

namespace Proceda\Fixtures\Factory;

use Proceda\NotaFiscal\Carga;

final class CargaFactory extends Factory
{
    public static function create(): Carga
    {
        return new Carga(
            tipo: self::type('carga'),
            modalidade: self::type('modalidade'),
            natureza: self::natureza(),
            acondicionamento: self::acondicionamento(),
            planoCargaRapida: self::boolean('planoCargaRapida'),
            localDesembarque: self::localDesembarque(),
            condicaoPeriodoEntrega: self::type('condicaoPeriodoEntrega'),
            inicioEntrega: null,
            fimEntrega: null,
        );
    }
}
