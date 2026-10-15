<?php

namespace Proceda\Fixtures\Scenario;

use Proceda\Fixtures\Builder\AgenteBuilder;
use Proceda\Fixtures\Builder\CobrancaBuilder;
use Proceda\Fixtures\Builder\ConhecimentoBuilder;
use Proceda\Fixtures\Builder\DestinatarioBuilder;
use Proceda\Fixtures\Builder\DoccobBuilder;
use Proceda\Fixtures\Builder\EmpresaBuilder;
use Proceda\Fixtures\Builder\FreteBuilder;
use Proceda\Fixtures\Builder\IntercambioBuilder;
use Proceda\Fixtures\Builder\NotaFiscalBuilder;
use Proceda\Fixtures\Builder\TransportadorBuilder;
use Proceda\Fixtures\Builder\UnidadeBuilder;
use Proceda\Intercambio;
use Proceda\Proceda;
use Proceda\Schema\LayoutVersion;

final class DoccobV50 extends Scenario
{
    public static function allFields(): Intercambio
    {
        self::initialize(
            Proceda::doccob(
                layoutVersion: LayoutVersion::V50,
            )
        );

        $conhecimento = ConhecimentoBuilder::lazy(
            fn(ConhecimentoBuilder $builder) =>
            $builder
                ->withEmissor(EmpresaBuilder::lazy(
                    fn(EmpresaBuilder $builder) =>
                    $builder->withUnidade(UnidadeBuilder::lazy()),
                ))
                ->withResumo(
                    NotaFiscalBuilder::lazy(
                        fn(NotaFiscalBuilder $builder) =>
                        $builder
                            ->withDestinatario(DestinatarioBuilder::lazy())
                            ->withEmissor(EmpresaBuilder::lazy())
                            ->withFrete(FreteBuilder::lazy()),
                    ),
                )
                ->withNotaFiscal(NotaFiscalBuilder::lazy())
                ->withNotaFiscal(NotaFiscalBuilder::lazy())
                ->withNotaFiscal(NotaFiscalBuilder::lazy()),
        );

        $cobranca = CobrancaBuilder::lazy(
            fn(CobrancaBuilder $builder) =>
            $builder
                ->withEmissor(EmpresaBuilder::lazy(
                    fn(EmpresaBuilder $builder) =>
                    $builder->withUnidade(UnidadeBuilder::lazy()),
                ))
                ->withAgente(AgenteBuilder::lazy())
                ->withConhecimento($conhecimento)
                ->withConhecimento($conhecimento),
        );

        $transportador = TransportadorBuilder::lazy(
            fn(TransportadorBuilder $builder) =>
            $builder
                ->withEmpresa(EmpresaBuilder::lazy())
                ->withCobranca($cobranca)
                ->withCobranca($cobranca),
        );

        $doccob = DoccobBuilder::lazy(
            fn(DoccobBuilder $builder) =>
            $builder->withTransportador($transportador),
        );

        return IntercambioBuilder::create()
            ->withDocumento($doccob)
            ->withDocumento($doccob)
            ->withDocumento($doccob)
            ->build();
    }
}