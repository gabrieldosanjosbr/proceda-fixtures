<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\ConembBuilder;
use Proceda\Fixtures\Builder\ConhecimentoBuilder;
use Proceda\Fixtures\Builder\CteBuilder;
use Proceda\Fixtures\Builder\EmpresaBuilder;
use Proceda\Fixtures\Builder\FreteBuilder;
use Proceda\Fixtures\Builder\ImpostoBuilder;
use Proceda\Fixtures\Builder\IntercambioBuilder;
use Proceda\Fixtures\Builder\NotaFiscalBuilder;
use Proceda\Fixtures\Builder\TransportadorBuilder;
use Proceda\Fixtures\Builder\TributoBuilder;
use Proceda\Intercambio;
use Proceda\Proceda;
use Proceda\Schema\LayoutVersion;

final class ConembV31 extends Scenario
{
    public static function allFields(): Intercambio
    {
        self::initialize(
            Proceda::conemb(
                layoutVersion: LayoutVersion::V31,
            )
        );

        $resumo = NotaFiscalBuilder::lazy(
            fn(NotaFiscalBuilder $builder) =>
            $builder->withFrete(
                FreteBuilder::lazy(
                    fn(FreteBuilder $builder) =>
                    $builder->withImposto(
                        ImpostoBuilder::lazy(
                            fn(ImpostoBuilder $builder) =>
                            $builder
                                ->withTributo(
                                    'icms',
                                    TributoBuilder::lazy(),
                                )
                                ->withTributo(
                                    'iss',
                                    TributoBuilder::lazy(),
                                ),
                        ),
                    ),
                ),
            ),
        );

        $conhecimento = ConhecimentoBuilder::lazy(
            fn(ConhecimentoBuilder $builder) =>
            $builder
                ->withResumo($resumo)
                ->withCte(CteBuilder::lazy())
                ->withNotaFiscal(NotaFiscalBuilder::lazy())
                ->withEmissor(EmpresaBuilder::lazy())
                ->withContratante(EmpresaBuilder::lazy())
        );

        $transportador = TransportadorBuilder::lazy(
            fn(TransportadorBuilder $builder) =>
            $builder
                ->withEmpresa(EmpresaBuilder::lazy())
                ->withConhecimento($conhecimento)
                ->withConhecimento($conhecimento),
        );

        $conemb = ConembBuilder::lazy(
            fn(ConembBuilder $builder) =>
            $builder->withTransportador($transportador),
        );

        return IntercambioBuilder::create()
            ->withDocumento($conemb)
            ->withDocumento($conemb)
            ->build();
    }
}