<?php

namespace Proceda\Fixtures\Factory;

use Proceda\Cobranca;

final class CobrancaFactory extends Factory
{
    public static function create(): Cobranca
    {
        return new Cobranca(
            serie: self::numerify('serie'),
            numero: self::numerify('numero'),
            tipo: self::type('tipo'),
            documento: self::type('documento'),
            dataEmissao: self::date('dataEmissao'),
            dataVencimento: self::date('dataVencimento'),
            valor: self::decimal('valor'),
            multaPorAtraso: self::decimal('multaPorAtraso'),
            valorJurosDiaAtraso: self::decimal('valorJurosDiaAtraso'),
            dataLimitePagamentoDesconto: self::date('dataLimitePagamentoDesconto'),
            valorDesconto: self::decimal('valorDesconto'),
            acaoDocumento: self::type('acaoDocumento'),
            identificacaoPreFaturaCliente: self::alphanumeric(
                'identificacaoPreFaturaCliente',
                'PREFAT-###',
            ),
            complementarPreFatura: self::alphanumeric('complementarPreFatura'),
            cfop: self::numerify('cfop'),
            agente: null,
            nfe: null,
            imposto: null,
            conhecimentos: [],
        );
    }
}
