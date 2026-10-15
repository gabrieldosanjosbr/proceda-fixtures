<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Frete;

final class FreteFactory extends Factory
{
    public static function create(): Frete
    {
        return new Frete(
            quantidadeVolumes: self::decimal('quantidadeVolumes'),
            volume: self::decimal('volume'),
            pesoBruto: self::decimal('pesoBruto'),
            pesoCubado: self::decimal('pesoCubado'),
            pesoDensidadeCubagem: self::decimal('pesoDensidadeCubagem'),
            valor: self::decimal('valor'),
            valorPesoVolume: self::decimal('valorPesoVolume'),
            adValorem: self::decimal('adValorem'),
            freteValor: self::decimal('freteValor'),
            valorSecCat: self::decimal('valorSecCat'),
            valorItr: self::decimal('valorItr'),
            valorDespacho: self::decimal('valorDespacho'),
            valorPedagio: self::decimal('valorPedagio'),
            valorAdeme: self::decimal('valorAdeme'),
            valorDespesasExtrasAdicionais: self::decimal('valorDespesasExtrasAdicionais'),
            calculoDiferenciado: self::boolean('calculoDiferenciado'),
            tabela: self::alphanumeric('tabela', 'TAB-####'),
            condicao: self::type('condicao'),
            modalidade: self::type('modalidade'),
            imposto: null,
        );
    }
}
